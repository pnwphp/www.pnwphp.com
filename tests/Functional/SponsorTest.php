<?php namespace Test\Functional;

use Test\TestCase;

class SponsorTest extends TestCase
{
    public function test_sponsor_admin_options_access()
    {
        $this->loginAs('sponsor')
            ->dontSee('Active?')
            ->see('Associate a User')
            ->see('Remove this User')
            ->dontSee('Delete this Sponsor');
    }
}
