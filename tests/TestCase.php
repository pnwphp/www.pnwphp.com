<?php namespace Test;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Illuminate\Contracts\Console\Kernel;

abstract class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function loginAs($role)
    {
        $emailAddress = $role.'@pnwphp.com';
        $password = 'password';
        $this->visit('login')
            ->type($emailAddress, 'email')
            ->type($password, 'password')
            ->press('Login');

        return $this;
    }
}
