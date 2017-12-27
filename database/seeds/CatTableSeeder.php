<?php

use Illuminate\Database\Seeder;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cats')->insert([
            'name' => '古典音乐'
 
        ]);
        DB::table('cats')->insert([
            'name' => '动漫/ACG/游戏'
         
 
        ]);
        DB::table('cats')->insert([
        
            'name' => '其他'
 
        ]);
    }
}
