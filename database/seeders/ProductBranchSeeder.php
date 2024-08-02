<?php

namespace Database\Seeders;

use App\Models\ProductBranch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Sam sung',
                'description' => 'Hàng đầu Việt Nam',
            ],
            [
                'name' => 'Apple',
                'description' => 'Uy quyen hàng đầu Việt Nam',
            ],
            [
                'name' => 'LG',
                'description' => 'Trao chọn yêu thương cho người tiêu dùng',
            ],
            [
                'name' => 'Sensuke Detiko',
                'description' => 'Luôn cố gắng nỗ lực từng ngày để phát triển',
            ]
        ];

        foreach ($branches as $branch) {
            $response  = Http::get('https://picsum.photos/500/500');
            $imageUrl = $response->effectiveUri();

            ProductBranch::create([
                ...$branch,
                'image_url' => $imageUrl
            ]);
        }
    }
}
