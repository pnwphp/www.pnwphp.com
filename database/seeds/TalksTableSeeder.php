<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;

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
            'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];
        foreach ($days as $day) {
            $start = rand(9,12);
            for($i = $start; $i < 20; $i += rand(1,2)) {
                if (rand(0,1)) {
                    factory(App\Models\Talk::class)->create([
                        'speaker_id' => App\Models\Speaker::inRandomOrder()->first()->id,
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
    }
}
