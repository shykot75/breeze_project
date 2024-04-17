<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\UserEnum;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::create([
//            UserEnum::USERNAME => 'super_admin',
//            UserEnum::NAME => 'Super Admin',
//            UserEnum::EMAIL => 'super@admin.com',
//            UserEnum::PHONE => '01234567890',
//            UserEnum::PASSWORD => Hash::make('12345678'),
//            UserEnum::ROLE => UserEnum::ROLE_ADMIN,
//            UserEnum::STATUS => UserEnum::STATUS_ACTIVE,
//        ]);

        User::create([
            UserEnum::USERNAME => 'user75',
            UserEnum::NAME => 'User',
            UserEnum::EMAIL => 'user@gmail.com',
            UserEnum::PHONE => '01234567890',
            UserEnum::PASSWORD => Hash::make('password'),
            UserEnum::ROLE => UserEnum::ROLE_USER,
            UserEnum::STATUS => UserEnum::STATUS_ACTIVE,
        ]);
    }
}
