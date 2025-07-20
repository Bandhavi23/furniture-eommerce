<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Living Room Furniture',
                'description' => 'Comfortable and stylish furniture for your living room including sofas, coffee tables, and entertainment units.',
                'image' => 'living-room.jpg'
            ],
            [
                'name' => 'Bedroom Furniture',
                'description' => 'Complete bedroom solutions including beds, wardrobes, bedside tables, and dressing tables.',
                'image' => 'bedroom.jpg'
            ],
            [
                'name' => 'Dining Room Furniture',
                'description' => 'Elegant dining tables, chairs, and buffets for your dining area.',
                'image' => 'dining-room.jpg'
            ],
            [
                'name' => 'Office Furniture',
                'description' => 'Professional office furniture including desks, chairs, and storage solutions.',
                'image' => 'office.jpg'
            ],
            [
                'name' => 'Kitchen & Storage',
                'description' => 'Kitchen cabinets, storage units, and organizational furniture.',
                'image' => 'kitchen.jpg'
            ],
            [
                'name' => 'Outdoor Furniture',
                'description' => 'Durable and weather-resistant furniture for outdoor spaces.',
                'image' => 'outdoor.jpg'
            ],
            [
                'name' => 'Kids Furniture',
                'description' => 'Safe and colorful furniture designed specifically for children.',
                'image' => 'kids.jpg'
            ],
            [
                'name' => 'Accessories & Decor',
                'description' => 'Home accessories, lighting, and decorative items to complete your space.',
                'image' => 'accessories.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'image' => $category['image'],
                'is_active' => true,
            ]);
        }
    }
} 