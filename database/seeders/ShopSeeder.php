<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//マニュアルから追記
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Shop;


class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shops')->insert([
            [
                'id' => 1,
                'shop_name' => '高級食パン',
                'area_id' => 1
            ],
            [
                'id' => 2,
                'shop_name' => '高級クロワッサン',
                'area_id' => 2
            ],
            [
                'id' => 3,
                'shop_name' => '高級コッペパン',
                'area_id' => 3
            ],
            [
                'id' => 4,
                'shop_name' => '高級メロンパン',
                'area_id' => 1
            ]
            ]);
    }
}
