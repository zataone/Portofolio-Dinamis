<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 8) as $i) {
            Testimonial::create([
                'brand_name' => 'Brand ' . chr(64+$i),
                'client_name' => 'Client ' . $i,
                'client_position' => 'Position ' . $i,
                'message' => 'Ini adalah testimonial dummy ke-' . $i,
                'photo' => 'testimonials/dummy' . $i . '.jpg',
            ]);
        }
    }
}
