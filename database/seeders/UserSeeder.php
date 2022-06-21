<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Andrés Sevillano Molina',
            'email' => 'andres.sevillano.net@gmail.com',
            'password' => bcrypt('hinata13'),
        ])->syncRoles(['admin', 'sa']);

        User::factory(10)->create();
    }
}
