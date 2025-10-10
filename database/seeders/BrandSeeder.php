<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'Brand A', 'logo' => 'brands/brand_a.png'],
            ['name' => 'Brand B', 'logo' => 'brands/brand_b.png'],
            ['name' => 'Brand C', 'logo' => 'brands/brand_c.png'],
            ['name' => 'Brand D', 'logo' => 'brands/brand_d.png'],
        ];
        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
