<?php namespace Test\Functional;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class adminSpeakerTest extends TestCase
{
    public function adminCreateSpeaker()
    {
        $this->loginAs('admin')
            ->see('Laravel');
    }

    public function speakerEditSpeaker()
    {
        $this->loginAs('speaker')
            ->see('Laravel');
    }

    public function adminEditSpeaker()
    {
        $this->loginAs('admin')
            ->see('Laravel');
    }
}
