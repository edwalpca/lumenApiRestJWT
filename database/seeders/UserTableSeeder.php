<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'Mauricio Alpizar',
            'email' => 'edwalpca@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
