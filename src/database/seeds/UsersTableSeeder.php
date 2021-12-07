<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'anan',
            'email' => 'anan@sample.com',
            'password' => Hash::make('anan1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'suzumura',
            'email' => 'suzumura@sample.com',
            'password' => Hash::make('suzumura5678'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        DB::table('users')->insert([
            'name' => 'yuuichi',
            'email' => 'yuuichi@sample.com',
            'password' => Hash::make('yuuichi0123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'ゲスト',
            'email' => 'guest@sample.com',
            'password' => Hash::make('guest0123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
