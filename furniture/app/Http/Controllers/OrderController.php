<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display the checkout page.
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'price' => $product->current_price,
                    'total' => $product->current_price * $details['quantity']
                ];
                $subtotal += $product->current_price * $details['quantity'];
            }
        }

        $tax = $subtotal * 0.18; // 18% GST
        $shipping = 0; // Free shipping for orders above ₹1000
        if ($subtotal < 1000) {
            $shipping = 200;
        }
        $total = $subtotal + $tax + $shipping;

        return view('checkout.index', compact('cartItems', 'subtotal', 'tax', 'shipping', 'total'));
    }

    /**
     * Process the checkout and create order.
     */
    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
            'payment_method' => 'required|in:cod,online',
        ]);

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        try {
            DB::beginTransaction();

            $cartItems = [];
            $subtotal = 0;

            foreach ($cart as $id => $details) {
                $product = Product::find($id);
                if ($product && $product->stock >= $details['quantity']) {
                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $details['quantity'],
                        'price' => $product->current_price,
                        'total' => $product->current_price * $details['quantity']
                    ];
                    $subtotal += $product->current_price * $details['quantity'];
                } else {
                    throw new \Exception('Product ' . $product->name . ' is out of stock or insufficient quantity.');
                }
            }

            $tax = $subtotal * 0.18;
            $shipping = $subtotal < 1000 ? 200 : 0;
            $total = $subtotal + $tax + $shipping;

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $total,
                'tax_amount' => $tax,
                'shipping_amount' => $shipping,
                'discount_amount' => 0,
                'status' => 'pending',
                'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'paid',
                'payment_method' => $request->payment_method,
                'shipping_address' => $request->shipping_address,
                'billing_address' => $request->billing_address,
                'shipping_phone' => $request->phone,
                'shipping_email' => $request->email,
                'notes' => $request->notes ?? null,
            ]);

            // Create order items and update stock
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'product_name' => $item['product']->name,
                    'product_sku' => $item['product']->sku,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['total'],
                ]);

                // Update product stock
                $item['product']->decrement('stock', $item['quantity']);
            }

            // Clear cart
            session()->forget('cart');

            DB::commit();

            return redirect()->route('orders.show', $order->id)
                           ->with('success', 'Order placed successfully! Order number: ' . $order->order_number);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error processing order: ' . $e->getMessage());
        }
    }

    /**
     * Display user's orders.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Display specific order details.
     */
    public function show($id)
    {
        $order = Order::where('id', $id)
                     ->where('user_id', Auth::id())
                     ->with('orderItems.product')
                     ->firstOrFail();

        return view('orders.show', compact('order'));
    }
} 