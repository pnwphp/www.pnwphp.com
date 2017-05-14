<?php namespace Test\Functional;

use Test\TestCase;

class AdminSponsorTest extends TestCase
{
    public function test_admin_sponsor_options_access()
    {
        $this->loginAs('admin')
            ->click('pending-sponsor-0')
            ->see('Active?')
            ->see('Associate a User')
            ->see('Delete this Sponsor')
            ->click('active-sponsor-0')
            ->see('Active?')
            ->see('Associate a User')
            ->see('Delete this Sponsor');
    }
}
