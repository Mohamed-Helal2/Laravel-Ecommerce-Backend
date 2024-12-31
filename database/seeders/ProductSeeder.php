<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Earbuds',
                'category_id' => 1, // Technology
                'description' => 'High-quality wireless earbuds with noise cancellation.',
                'price' => 99.99,
                'quantity' => 50,
            ],
            [
                'name' => 'Yoga Mat',
                'category_id' => 5, // Health & Wellness
                'description' => 'Non-slip yoga mat for all types of exercises.',
                'price' => 25.00,
                'quantity' => 100,
            ],
            [
                'name' => 'Gaming Mouse',
                'category_id' => 9, // Gaming
                'description' => 'Ergonomic gaming mouse with customizable buttons.',
                'price' => 45.99,
                'quantity' => 30,
            ],
            [
                'name' => 'Cookbook for Beginners',
                'category_id' => 8, // Food & Recipes
                'description' => 'Easy recipes for people learning to cook.',
                'price' => 15.00,
                'quantity' => 20,
            ],
            [
                'name' => 'Travel Backpack',
                'category_id' => 7, // Travel
                'description' => 'Durable backpack with multiple compartments for travelers.',
                'price' => 60.00,
                'quantity' => 40,
            ],
            [
                'name' => 'Smartwatch',
                'category_id' => 1, // Technology
                'description' => 'Feature-packed smartwatch with fitness tracking and notifications.',
                'price' => 120.00,
                'quantity' => 25,
            ],
            [
                'name' => 'Foam Roller',
                'category_id' => 5, // Health & Wellness
                'description' => 'High-density foam roller for muscle recovery and stretching.',
                'price' => 20.00,
                'quantity' => 75,
            ],
            [
                'name' => '4K Action Camera',
                'category_id' => 7, // Travel
                'description' => 'Compact and waterproof camera for adventure enthusiasts.',
                'price' => 150.00,
                'quantity' => 15,
            ],
            [
                'name' => 'LED Desk Lamp',
                'category_id' => 3, // Lifestyle
                'description' => 'Adjustable LED desk lamp with multiple brightness levels.',
                'price' => 35.00,
                'quantity' => 60,
            ],
            [
                'name' => 'Noise-Canceling Headphones',
                'category_id' => 1, // Technology
                'description' => 'Over-ear headphones with superior sound quality and noise cancellation.',
                'price' => 200.00,
                'quantity' => 10,
            ],
        ];

        // Bulk insert for better performance
        Product::insert($products);
    }
}
