<?php namespace Test\Functional;

use Test\TestCase;

class AdminTalkTest extends TestCase
{
    public function test_admin_access()
    {
        $this->loginAs('admin')
            ->see('Event Admin')
            ->click('talk-0')
            ->see('Presentation Day')
            ->see('Start Time')
            ->see('End Time');
    }
}
