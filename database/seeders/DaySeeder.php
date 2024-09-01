<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tourIds = Tour::pluck('id')->toArray();

        $days = [
            ['tour_id' => $tourIds[0], 'date' => '2024-08-28', 'title' => 'Roma'],
            ['tour_id' => $tourIds[0], 'date' => '2024-08-29', 'title' => 'Milano'],
            ['tour_id' => $tourIds[1], 'date' => '2024-09-01', 'title' => 'Barcelona'],
            ['tour_id' => $tourIds[1], 'date' => '2024-09-02', 'title' => 'Madrid'],
            // ['tour_id' => $tourIds[2], 'date' => '2024-10-03', 'title' => ''],
            // ['tour_id' => $tourIds[2], 'date' => '2024-10-04', 'title' => ''],
            // ['tour_id' => $tourIds[3], 'date' => '2025-01-05', 'title' => ''],
        ];

        foreach ($days as $dayData) {
            Day::create($dayData);
        }
    }
}
