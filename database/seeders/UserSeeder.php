<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(User::where('email', 'niamulhasanbd@gmail.com')->first())) {
            $user = new User();
            $user->name = "Niamul Hasan";
            $user->email = "niamulhasanbd@gmail.com";
            $user->password = Hash::make('niamulhasan');
            $user->save();
        }
    }
}
