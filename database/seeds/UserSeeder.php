<?php


use App\User;
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
        $admin = User::create([
            'name' => 'fiqri',
            'email' => 'Fiqririzal@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '0813212',
        ]);
        $admin->assignRole('Admin');

        $admin = User::create([
            'name' => 'Arsy Nizlan Ramadhan',
            'email' => 'arsy@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '0813212',
        ]);
        $admin->assignRole('Admin');
    }
}