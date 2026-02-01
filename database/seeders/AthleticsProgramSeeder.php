<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AthleticsProgram;

class AthleticsProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => '100m Sprint',
                'image_url' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'head_coach' => 'Coach Kipchoge',
                'assistant_coaches' => 'Coach Rudisha',
                'year_integrated' => '2015',
                'gold_medals' => 12,
                'silver_medals' => 8,
                'bronze_medals' => 5,
                'base_athlete_count' => 45,
                'active' => true,
            ],
            [
                'name' => 'Long Distance',
                'image_url' => 'https://media.istockphoto.com/id/1400048768/photo/fit-african-american-couple-running-outdoors-while-exercising-young-athletic-man-and-woman.jpg?s=612x612&w=0&k=20&c=ao3uUBotwmuyHp4VJKXE3PhIW_h0Ah_cebmZi6zRgbo=',
                'head_coach' => 'Coach Tergat',
                'assistant_coaches' => 'Coach Kosgei',
                'year_integrated' => '2013',
                'gold_medals' => 25,
                'silver_medals' => 15,
                'bronze_medals' => 10,
                'base_athlete_count' => 60,
                'active' => true,
            ],
            [
                'name' => 'Javelin Throw',
                'image_url' => 'https://media.istockphoto.com/id/663208674/photo/athlete-about-to-throw-a-javelin.jpg?s=612x612&w=0&k=20&c=Vc_Nx70TYMEsuEaonzfVykFArWVLln3pCt4Rq7_RHwk=',
                'head_coach' => 'Coach Yego',
                'assistant_coaches' => 'Coach Kipyegon',
                'year_integrated' => '2016',
                'gold_medals' => 5,
                'silver_medals' => 3,
                'bronze_medals' => 2,
                'base_athlete_count' => 20,
                'active' => true,
            ],
            [
                'name' => 'High Jump',
                'image_url' => 'https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'head_coach' => 'Coach Barshim',
                'assistant_coaches' => 'Coach Bondarenko',
                'year_integrated' => '2018',
                'gold_medals' => 3,
                'silver_medals' => 4,
                'bronze_medals' => 6,
                'base_athlete_count' => 15,
                'active' => true,
            ],
             [
                'name' => 'Relay',
                'image_url' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'head_coach' => 'Coach Bolt',
                'assistant_coaches' => 'Coach Blake',
                'year_integrated' => '2014',
                'gold_medals' => 8,
                'silver_medals' => 6,
                'bronze_medals' => 4,
                'base_athlete_count' => 30,
                'active' => true,
            ],
        ];

        foreach ($programs as $program) {
            AthleticsProgram::updateOrCreate(['name' => $program['name']], $program);
        }
    }
}
