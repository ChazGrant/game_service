<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 9; ++$i) {
            $name = Str::random(10);
            DB::table("game_models")->insert([
                "name" => $name,
                "image_path" => "game_images/". $i,
                "slug" => "/games/".$name
            ]);
        }
    }
}
