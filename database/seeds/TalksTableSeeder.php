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
        $days = [
            0,1,2,3,4,5
        ];
        foreach ($days as $day) {
            $start = rand(9,12);
            for($i = $start; $i < 20; $i += rand(1,2)) {
                if (rand(0,1)) {
                    factory(App\Models\Talk::class)->create([
                        'day' => $day,
                        'start_time' => $i.':00',
                        'end_time' => $i+1 . ':00'
                    ]);
                } else {
                    factory(App\Models\Event::class)->create([
                        'day' => $day,
                        'start_time' => $i.':00',
                        'end_time' => $i+1 . ':00'
                    ]);
                }
            }
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
