<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'          => 'Ricardo Gubat',
            'email'         => 'gubatricardo@gmail.com',
            'password'      => Hash::make('password')
        ]);
    }
}
