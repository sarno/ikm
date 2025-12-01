<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-superadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a superadmin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->current_team_id = 1;
        $user->flag = 1;
        $user->save();

        $this->info('Superadmin user created successfully!');
        $this->info('Email: superadmin@example.com');
        $this->info('Password: 12345678');
    }
}
