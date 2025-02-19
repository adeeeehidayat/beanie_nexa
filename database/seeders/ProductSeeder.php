<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'name' => 'Espresso Shot',
                'description' => 'Kopi espresso murni dengan rasa kuat dan aroma khas.',
                'price' => 25000,
                'image' => 'https://placehold.co/300x200',
                'stock' => 10,
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Kombinasi espresso, susu, dan busa susu yang sempurna.',
                'price' => 35000,
                'image' => 'https://placehold.co/300x200',
                'stock' => 10,
            ],
            [
                'name' => 'Café Latte',
                'description' => 'Espresso dengan campuran susu yang lembut dan creamy.',
                'price' => 37000,
                'image' => 'https://placehold.co/300x200',
                'stock' => 10,
            ],
            [
                'name' => 'Americano',
                'description' => 'Espresso yang dicampur dengan air panas untuk rasa ringan.',
                'price' => 28000,
                'image' => 'https://placehold.co/300x200',
                'stock' => 10,
            ],
            [
                'name' => 'Mocha',
                'description' => 'Kombinasi sempurna antara espresso, susu, dan coklat.',
                'price' => 39000,
                'image' => 'https://placehold.co/300x200',
                'stock' => 10,
            ],
            [
                'name' => 'Affogato',
                'description' => 'Espresso yang disajikan dengan es krim vanila.',
                'price' => 42000,
                'image' => 'https://placehold.co/300x200',
                'stock' => 10,
            ],
        ]);
    }
}
