<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'システム管理者',
            'mail' => 'admin@mail.com',
            'password' => 'demodemo',
            'user_category' => '0',
            'is_deleted' => 0
        ];
        DB::table('user')->insert($param);

        $param = [
            'name' => '在庫発注管理者',
            'mail' => 'demo1@mail.com',
            'password' => 'demodemo',
            'user_category' => '1',
            'is_deleted' => 0
        ];
        DB::table('user')->insert($param);

        $param = [
            'name' => '在庫発注社員',
            'mail' => 'demo2@mail.com',
            'password' => 'demodemo',
            'user_category' => '2',
            'is_deleted' => 0
        ];
        DB::table('user')->insert($param);

        $param = [
            'name' => '在庫受注社',
            'mail' => 'demo3@mail.com',
            'password' => 'demodemo',
            'user_category' => '3',
            'is_deleted' => 0
        ];
        DB::table('user')->insert($param);
    }
}
