<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=[
            ['name'=>'Technology' ,'description'=>'Stay updated with the latest trends, news, and innovations in technology, including gadgets, software, AI, and robotics.'],
            ['name'=>'Lifestyle' ,'description'=>' Tips and ideas to enhance your daily life, from wellness and fitness to home decor and personal development.'],
            ['name'=>'Education','description'=>'Resources, guides, and tips for learning new skills, excelling academically, and exploring educational opportunities.'],
            ['name'=>'Entertainment','description'=>' Discover the latest in movies, music, games, and trending pop culture.'],
            ['name'=>'Health & Wellness','description'=>'Insights on maintaining a healthy lifestyle with advice on fitness, nutrition, mental health, and self-care.'],
            ['name'=>'Finance','description'=>'Get advice on managing your money, investing, saving, and financial planning for a secure future.'],
            ['name'=>'Travel','description'=>'Explore travel destinations, tips for planning trips, and stories from around the world.'],
            ['name'=>'Food & Recipes','description'=>' Find mouth-watering recipes, food reviews, and culinary tips for every occasion'],
            ['name'=>'DIY & Crafts','description'=>'Learn how to create unique, personalized items with fun and easy DIY projects.'],
            ['name'=>'Fashion & Beauty','description'=>'Keep up with the latest trends in fashion and beauty, along with tips for styling and skincare.'],

        ];
        Category::insert($categories);
     
    }
}
