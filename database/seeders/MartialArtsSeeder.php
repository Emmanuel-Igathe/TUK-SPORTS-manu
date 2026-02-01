<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MartialArtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $arts = [
            [
                'name' => 'Karate',
                'image_url' => 'https://www.shutterstock.com/image-photo/africanamerican-caucasian-men-kimono-belts-600nw-2095092028.jpg',
                'total_students' => 25,
                'head_instructor' => 'Sensei Wanjiku',
                'assistant_instructors' => 'Sensei Otieno, Sensei Mumbi',
                'year_integrated' => 2010,
                'gold_medals' => 38,
                'silver_medals' => 22,
                'bronze_medals' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Taekwondo',
                'image_url' => 'https://www.shutterstock.com/image-photo/young-african-american-man-training-600nw-2167501369.jpg',
                'total_students' => 28,
                'head_instructor' => 'Master Kimani',
                'assistant_instructors' => 'Master Chebet',
                'year_integrated' => 2011,
                'gold_medals' => 42,
                'silver_medals' => 18,
                'bronze_medals' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Judo',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQg3d_dzDFNKFdx5ZOO3peBBnl7FYDugGNE-A&s',
                'total_students' => 20,
                'head_instructor' => 'Sensei Mwangi',
                'assistant_instructors' => 'Sensei Adhiambo',
                'year_integrated' => 2012,
                'gold_medals' => 35,
                'silver_medals' => 20,
                'bronze_medals' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kung Fu',
                'image_url' => 'https://www.shutterstock.com/shutterstock/photos/20821537/display_1500/stock-photo-african-american-man-in-a-kung-fu-black-suit-20821537.jpg',
                'total_students' => 18,
                'head_instructor' => 'Sifu Ochieng',
                'assistant_instructors' => 'Sifu Wanjiru',
                'year_integrated' => 2013,
                'gold_medals' => 28,
                'silver_medals' => 15,
                'bronze_medals' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aikido',
                'image_url' => 'https://media.istockphoto.com/id/1393100211/vector/aikido-fighters-martial-arts-inscription-on-illustration-is-a-hieroglyphs-of-aikido-japanese.jpg?s=612x612&w=0&k=20&c=QRvibQSGhazNO2c-PPO-TaAU1FxzDsK4-AlgPYSwvh8=',
                'total_students' => 15,
                'head_instructor' => 'Sensei Kiprop',
                'assistant_instructors' => 'Sensei Njeri',
                'year_integrated' => 2014,
                'gold_medals' => 22,
                'silver_medals' => 12,
                'bronze_medals' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($arts as $art) {
            \App\Models\MartialArt::updateOrCreate(['name' => $art['name']], $art);
        }
    }
}
