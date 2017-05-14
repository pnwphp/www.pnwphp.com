<?php namespace Test\Functional;

use Test\TestCase;

class SpeakerTest extends TestCase
{
    public function test_speaker_admin_options_access()
    {
        $this->loginAs('speaker')
            ->dontSee('Associate a User')
            ->dontSee('Remove this User')
            ->dontSee('Delete this Speaker')
            ->dontSee('Presentation Day')
            ->dontSee('Start Time')
            ->dontSee('End Time');
    }
}
