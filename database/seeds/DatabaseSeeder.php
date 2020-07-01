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
        factory(App\User::class)->create([
            'name' => 'quangdeptrai',
            'email' => 'quangtest@gmail.com',
        ]);
        // $this->call(UserSeeder::class);
    }
}
