<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThrowingGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $games = [
            [
                'name' => 'Javelin',
                'image_url' => 'https://media.istockphoto.com/id/663208674/photo/athlete-about-to-throw-a-javelin.jpg?s=612x612&w=0&k=20&c=Vc_Nx70TYMEsuEaonzfVykFArWVLln3pCt4Rq7_RHwk=',
                'total_athletes' => 18,
                'head_coach' => 'Coach Mwangi',
                'assistant_coaches' => 'Coach Wanjiku',
                'year_integrated' => 2010,
                'gold_medals' => 32,
                'silver_medals' => 18,
                'bronze_medals' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Discus',
                'image_url' => 'https://c.files.bbci.co.uk/F05A/production/_126203516_gettyimages-1412541002.jpg',
                'total_athletes' => 16,
                'head_coach' => 'Coach Kamau',
                'assistant_coaches' => 'Coach Achieng',
                'year_integrated' => 2011,
                'gold_medals' => 28,
                'silver_medals' => 15,
                'bronze_medals' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shot Put',
                'image_url' => 'https://t3.ftcdn.net/jpg/01/28/60/34/360_F_128603459_P1vOlVT6wubsbkllchzJ6HASGHBqClAS.jpg',
                'total_athletes' => 20,
                'head_coach' => 'Coach Ochieng',
                'assistant_coaches' => 'Coach Mumbi',
                'year_integrated' => 2012,
                'gold_medals' => 35,
                'silver_medals' => 20,
                'bronze_medals' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hammer Throw',
                'image_url' => 'https://assets.aws.worldathletics.org/large/ceac170a-2be5-4bb6-8fbe-578f40f2d518.jpg',
                'total_athletes' => 12,
                'head_coach' => 'Coach Nyongesa',
                'assistant_coaches' => 'Coach Chebet',
                'year_integrated' => 2013,
                'gold_medals' => 22,
                'silver_medals' => 12,
                'bronze_medals' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Precision Throwing',
                'image_url' => 'https://thumbs.dreamstime.com/b/darts-10317095.jpg',
                'total_athletes' => 16,
                'head_coach' => 'Coach Wairimu',
                'assistant_coaches' => 'Coach Otieno',
                'year_integrated' => 2015,
                'gold_medals' => 30,
                'silver_medals' => 16,
                'bronze_medals' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($games as $game) {
            \App\Models\ThrowingGame::updateOrCreate(['name' => $game['name']], $game);
        }
    }
}
