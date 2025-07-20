<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Living Room Furniture
            [
                'name' => 'Premium 3-Seater Sofa',
                'description' => 'Elegant and comfortable 3-seater sofa with premium fabric upholstery. Perfect for your living room with ergonomic design and sturdy construction.',
                'price' => 25000,
                'sale_price' => 22000,
                'stock' => 15,
                'sku' => 'SOFA-001',
                'image' => 'sofa-3-seater.jpg',
                'category' => 'Living Room Furniture',
                'is_featured' => true,
                'brand' => 'Nilkamal',
                'material' => 'Premium Fabric',
                'color' => 'Beige',
                'dimensions' => '220 x 85 x 90 cm',
                'specifications' => [
                    'Seating Capacity' => '3 Persons',
                    'Frame Material' => 'Solid Wood',
                    'Cushion Type' => 'High Density Foam',
                    'Warranty' => '2 Years'
                ]
            ],
            [
                'name' => 'Modern Coffee Table',
                'description' => 'Contemporary coffee table with sleek design and ample storage. Features a glass top and wooden base for a modern look.',
                'price' => 8500,
                'stock' => 25,
                'sku' => 'TABLE-001',
                'image' => 'coffee-table.jpg',
                'category' => 'Living Room Furniture',
                'brand' => 'Nilkamal',
                'material' => 'Glass & Wood',
                'color' => 'Brown',
                'dimensions' => '120 x 60 x 45 cm',
                'specifications' => [
                    'Top Material' => 'Tempered Glass',
                    'Base Material' => 'Engineered Wood',
                    'Storage' => 'Yes',
                    'Warranty' => '1 Year'
                ]
            ],
            [
                'name' => 'TV Entertainment Unit',
                'description' => 'Spacious TV unit with multiple compartments for organized storage. Perfect for modern living rooms with cable management.',
                'price' => 12000,
                'sale_price' => 10500,
                'stock' => 12,
                'sku' => 'TV-UNIT-001',
                'image' => 'tv-unit.jpg',
                'category' => 'Living Room Furniture',
                'is_featured' => true,
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'Walnut',
                'dimensions' => '180 x 45 x 60 cm',
                'specifications' => [
                    'TV Size Support' => 'Up to 65 inches',
                    'Storage Compartments' => '4',
                    'Cable Management' => 'Yes',
                    'Warranty' => '1 Year'
                ]
            ],

            // Bedroom Furniture
            [
                'name' => 'Queen Size Bed with Storage',
                'description' => 'Comfortable queen size bed with built-in storage drawers. Features a modern headboard and hydraulic lift mechanism.',
                'price' => 18000,
                'stock' => 8,
                'sku' => 'BED-001',
                'image' => 'queen-bed.jpg',
                'category' => 'Bedroom Furniture',
                'is_featured' => true,
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'White',
                'dimensions' => '165 x 195 x 60 cm',
                'specifications' => [
                    'Bed Size' => 'Queen (165 x 195 cm)',
                    'Storage Type' => 'Hydraulic Lift',
                    'Headboard' => 'Yes',
                    'Warranty' => '2 Years'
                ]
            ],
            [
                'name' => '4-Door Wardrobe',
                'description' => 'Spacious 4-door wardrobe with hanging space and shelves. Features mirror doors and soft-close mechanism.',
                'price' => 22000,
                'sale_price' => 19500,
                'stock' => 10,
                'sku' => 'WARDROBE-001',
                'image' => 'wardrobe.jpg',
                'category' => 'Bedroom Furniture',
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'Walnut',
                'dimensions' => '240 x 60 x 200 cm',
                'specifications' => [
                    'Doors' => '4',
                    'Mirror Doors' => '2',
                    'Hanging Space' => 'Yes',
                    'Warranty' => '2 Years'
                ]
            ],
            [
                'name' => 'Bedside Table',
                'description' => 'Elegant bedside table with drawer and shelf. Perfect for keeping essentials within reach.',
                'price' => 3500,
                'stock' => 30,
                'sku' => 'BEDSIDE-001',
                'image' => 'bedside-table.jpg',
                'category' => 'Bedroom Furniture',
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'White',
                'dimensions' => '45 x 35 x 55 cm',
                'specifications' => [
                    'Drawers' => '1',
                    'Shelf' => '1',
                    'Material' => 'Engineered Wood',
                    'Warranty' => '1 Year'
                ]
            ],

            // Dining Room Furniture
            [
                'name' => '6-Seater Dining Table Set',
                'description' => 'Complete dining set with table and 6 chairs. Features a glass top table and comfortable upholstered chairs.',
                'price' => 28000,
                'sale_price' => 24500,
                'stock' => 6,
                'sku' => 'DINING-001',
                'image' => 'dining-set.jpg',
                'category' => 'Dining Room Furniture',
                'is_featured' => true,
                'brand' => 'Nilkamal',
                'material' => 'Glass & Wood',
                'color' => 'Brown',
                'dimensions' => '150 x 90 x 75 cm',
                'specifications' => [
                    'Seating Capacity' => '6 Persons',
                    'Table Top' => 'Tempered Glass',
                    'Chairs' => '6 Upholstered',
                    'Warranty' => '2 Years'
                ]
            ],
            [
                'name' => 'Buffet Sideboard',
                'description' => 'Elegant buffet sideboard with multiple compartments for dining room storage and display.',
                'price' => 15000,
                'stock' => 8,
                'sku' => 'BUFFET-001',
                'image' => 'buffet.jpg',
                'category' => 'Dining Room Furniture',
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'Walnut',
                'dimensions' => '120 x 45 x 85 cm',
                'specifications' => [
                    'Compartments' => '3',
                    'Drawers' => '2',
                    'Glass Doors' => 'Yes',
                    'Warranty' => '1 Year'
                ]
            ],

            // Office Furniture
            [
                'name' => 'Executive Office Desk',
                'description' => 'Professional office desk with ample workspace and storage. Features cable management and ergonomic design.',
                'price' => 12000,
                'stock' => 15,
                'sku' => 'DESK-001',
                'image' => 'office-desk.jpg',
                'category' => 'Office Furniture',
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'Brown',
                'dimensions' => '140 x 70 x 75 cm',
                'specifications' => [
                    'Work Surface' => '140 x 70 cm',
                    'Storage' => '2 Drawers',
                    'Cable Management' => 'Yes',
                    'Warranty' => '1 Year'
                ]
            ],
            [
                'name' => 'Ergonomic Office Chair',
                'description' => 'Comfortable ergonomic office chair with adjustable features and breathable mesh back.',
                'price' => 8500,
                'sale_price' => 7200,
                'stock' => 20,
                'sku' => 'CHAIR-001',
                'image' => 'office-chair.jpg',
                'category' => 'Office Furniture',
                'is_featured' => true,
                'brand' => 'Nilkamal',
                'material' => 'Mesh & PU',
                'color' => 'Black',
                'dimensions' => '65 x 65 x 120 cm',
                'specifications' => [
                    'Adjustable Height' => 'Yes',
                    'Lumbar Support' => 'Yes',
                    'Armrests' => 'Adjustable',
                    'Warranty' => '2 Years'
                ]
            ],

            // Kitchen & Storage
            [
                'name' => 'Kitchen Storage Cabinet',
                'description' => 'Versatile storage cabinet perfect for kitchen organization. Features adjustable shelves and sturdy construction.',
                'price' => 9500,
                'stock' => 12,
                'sku' => 'CABINET-001',
                'image' => 'kitchen-cabinet.jpg',
                'category' => 'Kitchen & Storage',
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'White',
                'dimensions' => '90 x 40 x 180 cm',
                'specifications' => [
                    'Shelves' => '4 Adjustable',
                    'Doors' => '2',
                    'Material' => 'Engineered Wood',
                    'Warranty' => '1 Year'
                ]
            ],
            [
                'name' => 'Shoe Storage Unit',
                'description' => 'Compact shoe storage unit with multiple compartments. Perfect for entryway organization.',
                'price' => 4500,
                'stock' => 25,
                'sku' => 'SHOE-001',
                'image' => 'shoe-storage.jpg',
                'category' => 'Kitchen & Storage',
                'brand' => 'Nilkamal',
                'material' => 'Engineered Wood',
                'color' => 'Brown',
                'dimensions' => '80 x 30 x 100 cm',
                'specifications' => [
                    'Compartments' => '12',
                    'Material' => 'Engineered Wood',
                    'Assembly' => 'Required',
                    'Warranty' => '1 Year'
                ]
            ]
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();
            
            if ($category) {
                Product::create([
                    'name' => $product['name'],
                    'slug' => Str::slug($product['name']),
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'sale_price' => $product['sale_price'] ?? null,
                    'stock' => $product['stock'],
                    'sku' => $product['sku'],
                    'image' => $product['image'],
                    'category_id' => $category->id,
                    'is_featured' => $product['is_featured'] ?? false,
                    'is_active' => true,
                    'brand' => $product['brand'],
                    'material' => $product['material'],
                    'color' => $product['color'],
                    'dimensions' => $product['dimensions'],
                    'specifications' => $product['specifications'],
                ]);
            }
        }
    }
} 