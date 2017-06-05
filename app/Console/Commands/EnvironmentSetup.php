<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Ultraware\Roles\Models\Role;

class EnvironmentSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env:setup {database} {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update database username and password environment vars';

    protected $env;

    protected $environmentVariables = [];

    protected $insertions = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $env = base_path().'/.env';

        if (!$this->setupFileFromExample($env) ||
            !$this->assignEnvironmentVariables() ||
            !$this->createDatabasesIfNotExist()
        ) {
            return;
        }

        $file_lines = file($env);
        $count = count($this->environmentVariables);
        foreach ($file_lines as $lineNumber => $line) {
            $file_lines[$lineNumber] = $this->insertValue($line);
            if ($this->insertions == $count) {
                break;
            }
        }

        $content = implode('', $file_lines);

        file_put_contents($env, $content);

        $this->line('complete');
    }

    private function setupFileFromExample($env)
    {
        if (!file_exists($env)) {
            $example = base_path().'/.env.example';

            if (!copy($example, $env)) {
                $this->line("failed to create .env from example");
                return false;
            }
        }

        return true;
    }

    private function assignEnvironmentVariables()
    {
        $this->environmentVariables = [
            'DB_USERNAME' => $this->argument('username'),
            'DB_PASSWORD' => $this->argument('password'),
            'DB_DATABASE' => $this->argument('database')
        ];
        return true;
    }

    private function insertValue($line)
    {
        $initialValues = $this->environmentVariables;
        foreach ($initialValues as $key => $value) {
            if (strpos($line, $key) === false) {
                continue;
            }
            $line = $key . "=" . $this->environmentVariables[$key] . PHP_EOL;
            $this->insertions++;
            unset($this->environmentVariables[$key]);
            break;
        }

        return $line;
    }

    private function createDatabasesIfNotExist()
    {
        $un = $this->argument('username');
        $pw = $this->argument('password');
        $db = $this->argument('database');
        $link = mysqli_connect('localhost', $un, $pw);
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }

        if (!$link->query("CREATE DATABASE IF NOT EXISTS $db")) {
            $this->line('Error creating $db database: ');
            $this->line($link->error);

            return false;
        }

        return true;
    }
}
