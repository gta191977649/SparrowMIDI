<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 创建默认管理员
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'episodes27@gmail.com',
            'password' => bcrypt('123456'),
        ]);

    }
}
