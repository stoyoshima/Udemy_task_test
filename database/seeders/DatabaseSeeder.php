<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // $this->call(UsersTableSeeder::class);
        
        
        \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);

        \App\Models\ContactForm::factory(10)->create();
        $this->call(ContactFormSeeder::class);

        \App\Models\Area::factory(10)->create();
        $this->call(AreaSeeder::class);

        \App\Models\Shop::factory(10)->create();
        $this->call(ShopSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
