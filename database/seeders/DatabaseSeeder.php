<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Max Alexander',
            'email' => 'max.avalos@gmail.com',
            'password' => bcrypt('max123alexander')
        ]);
    }
}
