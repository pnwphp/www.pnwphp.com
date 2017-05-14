<?php namespace Test\Functional;

use Test\TestCase;

class AdminSpeakerTest extends TestCase
{
    public function test_admin_speaker_options_access()
    {
        $this->loginAs('admin')
            ->click('speaker-0')
            ->see('Associate a User')
            ->see('Remove this User')
            ->see('Delete this Speaker');
    }
}
