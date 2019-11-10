<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'berktopcu',
                'password' => Hash::make('q1w2e3r4'),
                'user_role' => 1
            ]
        ]);
    }
}
