<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $games = [
            [
                'name' => 'Chess',
                'image_url' => 'https://images.unsplash.com/photo-1586165368502-1bad197a6461?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'total_players' => 22,
                'head_coach' => 'Coach Mwangi',
                'assistant_coaches' => 'Coach Kamau',
                'year_integrated' => 2012,
                'wins' => 45,
                'losses' => 12,
                'draws' => 8,
            ],
            [
                'name' => 'Checkers',
                'image_url' => 'https://images.unsplash.com/photo-1590479773265-7464e5d48118?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'total_players' => 18,
                'head_coach' => 'Coach Ochieng',
                'assistant_coaches' => 'Coach Adhiambo',
                'year_integrated' => 2013,
                'wins' => 38,
                'losses' => 15,
                'draws' => 7,
            ],
            [
                'name' => 'Scrabble',
                'image_url' => 'https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'total_players' => 20,
                'head_coach' => 'Coach Wanjiku',
                'assistant_coaches' => 'Coach Mumbi',
                'year_integrated' => 2014,
                'wins' => 42,
                'losses' => 18,
                'draws' => 5,
            ],
            [
                'name' => 'Monopoly',
                'image_url' => 'https://images.unsplash.com/photo-1611195974226-a6a9be9dd763?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=2525',
                'total_players' => 16,
                'head_coach' => 'Coach Kipchoge',
                'assistant_coaches' => 'Coach Chebet',
                'year_integrated' => 2015,
                'wins' => 35,
                'losses' => 20,
                'draws' => 3,
            ],
            [
                'name' => 'Backgammon',
                'image_url' => 'https://images.unsplash.com/photo-1522069394066-326005dc26b2?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=2670',
                'total_players' => 12,
                'head_coach' => 'Coach Nyongesa',
                'assistant_coaches' => 'Coach Achieng',
                'year_integrated' => 2016,
                'wins' => 28,
                'losses' => 15,
                'draws' => 4,
            ],
            [
                'name' => 'Strategic Games',
                'image_url' => 'https://images.unsplash.com/photo-1610890716171-6b1c9f2c7210?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=2670',
                'total_players' => 14,
                'head_coach' => 'Coach Wairimu',
                'assistant_coaches' => 'Coach Otieno',
                'year_integrated' => 2017,
                'wins' => 32,
                'losses' => 18,
                'draws' => 6,
            ],
        ];

        foreach ($games as $game) {
            \App\Models\BoardGame::updateOrCreate(['name' => $game['name']], $game);
        }
    }
}
