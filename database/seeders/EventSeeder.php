<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $events = [
        //     [
        //         'event' => 'Cita #1',
        //         'start_date' => '2023-08-25 07:30',
        //         'end_date' => '2023-08-25 10:30',
        //     ],
        //     [
        //         'event' => 'Cita #2',
        //         'start_date' => '2023-08-26 07:30',
        //         'end_date' => '2023-08-26 10:30',
        //     ],
        //     [
        //         'event' => 'Cita #3',
        //         'start_date' => '2023-08-31 09:30',
        //         'end_date' => '2023-08-31 11:00',
        //     ],
        //     [
        //         'event' => 'Cita #4',
        //         'start_date' => '2023-07-31 09:30',
        //         'end_date' => '2023-08-3 11:00',
        //     ],
        // ];

        // foreach ($events as $event) {
        //     Event::create($event);
        // }

        // $fake = \Faker\Factory::create();

        $days = [[1,3], 5, 6, 9, [12, 13]];
        $fake = fake('id-ID');
        $today = date('Y-m-d');
        // $today = Carbon::now();

        // $events = [];

        foreach ($days as $day) {
            if (is_array($day)) {
                $events[]=[
                    'title' => $fake->sentence(3),
                    'start_date' => date('Y-m-d', strtotime($today. '+ '.$day[0].' days')),
                    'end_date' => date('Y-m-d', strtotime($today. '+ '.$day[1].' days')),
                    'category' => $fake->randomElement(['success', 'danger', 'warning', 'info']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

            } else {
                $events[]=[
                    'title' => $fake->sentence(3),
                    'start_date' => date('Y-m-d', strtotime($today. '+ '.$day.' days')),
                    'end_date' => date('Y-m-d', strtotime($today. '+ '.$day.' days')),
                    'category' => $fake->randomElement(['success', 'danger', 'warning', 'info']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // foreach ($days as $day) {
        //     if (is_array($day)) {
        //         // $start = $today->copy()->addDays($day[0])->toIso8601String();
        //         // $end = $today->copy()->addDays($day[1])->toIso8601String();
        //         $start = $today->copy()->addDays($day[0]);
        //         $end = $today->copy()->addDays($day[1]);
        //     } else {
        //         // $start = $today->copy()->addDays($day)->toIso8601String();
        //         // $end = $today->copy()->addDays($day)->toIso8601String();
        //         $start = $today->copy()->addDays($day);
        //         $end = $today->copy()->addDays($day);
        //     }

        //     $events[] = [
        //         'title' => $fake->sentence(3),
        //         'start_date' => $start,
        //         'end_date' => $end,
        //         'category' => $fake->randomElement(['success', 'danger', 'warning', 'info']),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        Event::insert($events);
        // dd($start, $end);
    }
}
