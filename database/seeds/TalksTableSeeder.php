<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;
use App\Models\Talk;
use App\Models\Speaker;

class TalksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventsList = [];

        for ($i = 0; $i < 30; $i++) {
            do {
                $day = rand(0, 4);
                $startHour = rand(9, 20);
            } while (isset($eventsList[$day . '-' . $startHour]));
            $eventsList[$day . '-' . $startHour] = true;

            factory(rand(0,1) ? App\Models\Talk::class : App\Models\Event::class)->create([
                'day' => $day,
                'start_time' => $startHour.':00',
                'end_time' => $startHour + 1 . ':00'
            ]);
        }

        $talks = Talk::all();
        $speakerCount = [1,1,1,1,1,2,3];
        foreach ($talks as $talk) {
            for ($i = 1; $i <= array_rand($speakerCount); $i++) {
                $speaker = Speaker::inRandomOrder()->first();
                if (empty($talk->speakers()->find($speaker->id))) {
                    $talk->speakers()->attach($speaker);
                }
            }
        }
    }
}
