<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Quần áo',
            ],
            [
                'name' => 'Quần áo nam',
                'parent_id' => 1,
            ],
            [
                'name' => 'Quần áo nữ',
                'parent_id' => 1,
            ],
            [
                'name' => 'Gia dụng',
            ],
            [
                'name' => 'Mỹ phẩm',
            ],
            [
                'name' => 'Điện thoại và phụ kiện',
            ],
            [
                'name' => 'Trang sức',
            ],
            [
                'name' => 'Điện tử và điện lạnh'
            ]
        ];

        foreach ($categories as $category) {
            $response  = Http::get('https://picsum.photos/300/300');
            $imageUrl = $response->effectiveUri();

            ProductCategory::create([
                ...$category,
                'image_url' => $imageUrl
            ]);
        }    
    }
}
