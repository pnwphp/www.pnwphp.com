<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;
use App\Models\User;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Talk;

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

        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        $speakerRole = Role::create([
            'name' => 'Speaker',
            'slug' => 'speaker'
        ]);

        $sponsorRole = Role::create([
            'name' => 'Sponsor',
            'slug' => 'sponsor'
        ]);

        User::create([
            'email' => 'admin@pnwphp.com',
            'name' => 'Admin User',
            'password' => Hash::make('password')
        ])->roles()->attach($adminRole);

        $speakerUser = User::create([
            'email' => 'speaker@pnwphp.com',
            'name' => 'Speaker User',
            'password' => Hash::make('password')
        ]);

        $speaker = Speaker::first();
        $talk = Talk::first();
        $speakerUser->speaker()->save($speaker);
        $speakerUser->roles()->attach($speakerRole);
        $speaker->talks()->attach($talk);

        $sponsorUser = User::create([
            'email' => 'sponsor@pnwphp.com',
            'name' => 'Sponsor User',
            'password' => Hash::make('password')
        ]);

        $sponsor = Sponsor::first();
        $sponsor->users()->attach($sponsorUser);
        $sponsorUser->roles()->attach($sponsorRole);
    }
}
