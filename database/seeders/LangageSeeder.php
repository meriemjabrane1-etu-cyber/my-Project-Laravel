<?php

namespace Database\Seeders;

use App\Models\Langage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Langage::insert([
            [
                'name' => 'HTML',
                'duration' => '2 week',
                'difficulty level' => 70 ,
            ],
            [
                'name' => 'CSS',
                'duration' => '3 weeK',
                'difficulty level' => 70 ,
            ],
            [
                'name' => 'JS',
                'duration' => 'mois',
                'difficulty level' => 90 ,
            ],
            [
                'name' => 'SASS',
                'duration' => '3 weeK',
                'difficulty level' => 80 ,
            ],
            [
                'name' => 'REACT',
                'duration' => '3 week',
                'difficulty level' => 70 ,
            ],

            [
                'name' => 'C',
                'duration' => '3 mois',
                'difficulty level' => 80 ,
            ],
            [
                'name' => 'C++',
                'duration' => '2 mois',
                'difficulty level' => 70 ,
            ]
            ,

            [
                'name' => 'C',
                'duration' => '3 mois',
                'difficulty level' => 80 ,
            ],
            [
                'name' => 'C++',
                'duration' => '2 mois',
                'difficulty level' => 70 ,
            ]

        ]);
    }
}
