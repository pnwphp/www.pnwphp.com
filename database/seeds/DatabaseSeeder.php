<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SpeakersTableSeeder');
        $this->call('TalksTableSeeder');
        $this->call('SponsorsTableSeeder');

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);
    }
}
