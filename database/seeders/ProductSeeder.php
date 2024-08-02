<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($index = 1; $index < 20; $index++ ) {
            $product = Product::create([
                'user_id' => 1,
                'code' => rand(1000000, 9999999),
                'product_category_id' => rand(1, 8),
                'product_branch_id' => rand(1, 3),
                'name' =>  fake()->words(3, true),
                'description' => fake()->paragraph(rand(100, 200)),
                'price' => rand(10000, 100000000),
                'quantity' => rand(100, 10000),
                'attributes' => [
                    'Tình trạng' => fake()->words(1, true),
                    'Gửi từ' => fake()->name(),
                    'Chú ý thêm' => fake()->words(2, true),
                ],
            ]);

            for ($i = 1; $i < rand(3, 6); $i++) {
                $response  = Http::get('https://picsum.photos/500/500');
                $imageUrl = $response->effectiveUri();

                $product->images()->create([
                    'image_url' => $imageUrl,
                    'thumbnail_image_url' => $imageUrl,
                ]);
            }
        }
    }
}
