<?php namespace Test\Functional;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function loginAsAdmin()
    {
        $this->loginAs('admin')
             ->see('Laravel');
    }

    public function loginAsSponsor()
    {
        $this->loginAs('sponsor')
            ->see('Laravel');
    }

    public function loginAsSpeaker()
    {
        $this->loginAs('speaker')
            ->see('Laravel');
    }
}
