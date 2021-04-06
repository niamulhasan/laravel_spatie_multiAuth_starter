<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(Admin::where('email', 'super@admin.com')->first())) {
            $admin = new Admin();
            $admin->name = "Super Admin";
            $admin->email = "super@admin.com";
            $admin->username = "superadmin";
            $admin->password = Hash::make('niamulhasan');
            $admin->save();
            $admin->assignRole('god');
        }
    }
}
