<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class SetupAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:admin {email} {name}';

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
        $user = new User([
            'email' => $this->argument('email'),
            'name' => $this->argument('name'),
            'password' => bcrypt(str_random(10)),
        ]);

        $user->super_user = true;

        try {
            $user->save();
        } catch (Exception $e) {
            echo $e;
        }
    }
}
