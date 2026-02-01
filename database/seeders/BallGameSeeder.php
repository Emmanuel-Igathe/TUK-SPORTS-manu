<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BallGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $games = [
            [
                'name' => 'Football',
                'image_url' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'total_players' => 45,
                'head_coach' => 'Coach Maina',
                'assistant_coaches' => 'Coach Kimani',
                'year_integrated' => 2010,
                'wins' => 65,
                'losses' => 20,
                'draws' => 15,
            ],
            [
                'name' => 'Basketball',
                'image_url' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'total_players' => 32,
                'head_coach' => 'Coach Okoth',
                'assistant_coaches' => 'Coach Atieno',
                'year_integrated' => 2011,
                'wins' => 55,
                'losses' => 25,
                'draws' => 5,
            ],
            [
                'name' => 'Volleyball',
                'image_url' => '/images/ball-games/volleyball.png',
                'total_players' => 28,
                'head_coach' => 'Coach Mutua',
                'assistant_coaches' => 'Coach Syokau',
                'year_integrated' => 2012,
                'wins' => 48,
                'losses' => 18,
                'draws' => 10,
            ],
            [
                'name' => 'Rugby',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXOB7MrkiGU5KQ2WToVEZk0rXcLzBv7pL8dQ&s',
                'total_players' => 35,
                'head_coach' => 'Coach Odhiambo',
                'assistant_coaches' => 'Coach Juma',
                'year_integrated' => 2010,
                'wins' => 58,
                'losses' => 22,
                'draws' => 2,
            ],
        ];

        foreach ($games as $game) {
            \App\Models\BallGame::updateOrCreate(
                ['name' => $game['name']],
                $game
            );
        }
    }
}
