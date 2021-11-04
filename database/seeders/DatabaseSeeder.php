<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'phone' => '11111111111',
            'email' => 'admin@admin.admin',
            'info' => 'admin',
            'admin' => true,
            'active' => true,
            'password' => Hash::make('503693')
        ]);

        $this->call([
            UserSeeder::class,
            ThemeSeeder::class,
            ArticleSeeder::class
        ]);
    }

}
