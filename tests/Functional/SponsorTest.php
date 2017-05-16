<?php namespace Test\Functional;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Test\TestCase;

class SponsorTest extends TestCase
{
    use DatabaseMigrations;

    public function test_sponsor_admin_options_access()
    {
        $this->loginAs('sponsor')
            ->dontSee('Active?')
            ->see('Associate a User')
            ->see('Remove this User')
            ->dontSee('Delete this Sponsor');
    }

    public function test_new_sponsor_inactive()
    {
        \Log::debug(public_path('images/pic01.jpg'));
        $this->visit('sponsors')
            ->click('Become a Sponsor')
            ->type('My New Sponsor Name', 'name')
            ->type('newsponsorsite.com', 'website')
            ->type('New Sponsor Contact', 'contact')
            ->type(config('app.email'), 'email')
            ->type('555-867-5309', 'phone')
            ->attach(public_path('images/pic01.jpg'), 'image')
            ->select('bronze', 'level')
            ->type('omg what a great description', 'desc')
            ->press('Submit')
            ->see('Your sponsorship will help us put on a great community event!');
    }
}
