<?php namespace Test\Functional;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class LoginTest extends TestCase
{
    /**
     * admin
     * Event Admin
     */
    public function test_login_access_admin()
    {
        $this->loginAs('admin')
             ->see('Event Admin');
    }

    /**
     * sponsor
     * Edit Sponsor Info
     */
    public function test_login_access_sponsor()
    {
        $this->loginAs('sponsor')
            ->see('Edit Sponsor Info')
            ->visit('admin/index');
    }

    /**
     * speaker
     * Edit Speaker Info
     */
    public function test_login_access_speaker()
    {
        $this->loginAs('speaker')
            ->see('Edit Speaker Info');
    }
}
