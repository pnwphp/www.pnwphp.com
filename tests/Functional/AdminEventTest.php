<?php namespace Test\Functional;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class adminTalkTest extends TestCase
{
    public function adminCreateTalk()
    {
        $this->loginAs('admin')
            ->see('Laravel');
    }

    public function adminEditTalk()
    {
        $this->loginAs('admin')
            ->see('Laravel');
    }

    public function adminAddSpeakerToTalk()
    {
        $this->loginAs('admin')
            ->see('Laravel');
    }

    public function adminRemoveSpeakerFromTalk()
    {
        $this->loginAs('admin')
            ->see('Laravel');
    }

    public function adminDeleteTalk()
    {
        $this->loginAs('admin')
            ->see('Laravel');
    }

    public function speakerCannotEditTalk()
    {
        $this->loginAs('speaker')
            ->see('Laravel');
    }
}
