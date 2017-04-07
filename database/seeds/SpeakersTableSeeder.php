<?php

use Illuminate\Database\Seeder;

class SpeakersTableSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < rand(3, 6); $i++) {
            factory(App\Models\Speaker::class)->create();
        }
    }
}
