<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//マニュアルから追記
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->count(50)->create();

        //
        // DB::table('users')->insert([
        //     [
        //     'name' => 'あああ',
        //     'email' => 'test@test.com',
        //     'password' => Hash::make('password123'),
        //     ],[
        //     'name' => 'いいい',
        //     'email' => 'test2@test.com',
        //     'password' => Hash::make('password123'),
        //     ],[
        //     'name' => 'かかか',
        //     'email' => 'test3@test.com',
        //     'password' => Hash::make('password123'),
        //     ]
        // ]);

        
    }
}
