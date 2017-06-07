<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Ultraware\Roles\Models\Role;

class CreateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create roles if none exist';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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

        $this->info("admin, speaker, sponsor roles created.");
    }
}
