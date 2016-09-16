<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the super admin for the application';

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
        User::create([
            'email' => $this->argument('email')
        ]);
    }
}
