<?php namespace Test\Functional;

use Test\TestCase;

class LoginTest extends TestCase
{
    public function test_admin_access()
    {
        $this->loginAs('admin')
            ->see('Event Admin');
    }

    public function test_sponsor_access()
    {
        $this->loginAs('sponsor')
            ->see('Edit Sponsor Info')
            ->visit('admin/index')
            ->seePageIs('sponsors/admin');
    }

    public function test_speaker_access()
    {
        $this->loginAs('speaker')
            ->see('Edit Speaker Info')
            ->visit('admin/index')
            ->seePageIs('speakers/admin')
            ->visit('admin/sponsor/delete')
            ->seePageIs('speakers/admin');
    }
}
