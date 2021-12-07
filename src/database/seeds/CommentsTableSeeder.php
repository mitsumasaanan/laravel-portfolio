<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => '3',
            'accomodation_id' => '1',
            'comment' => 'ブキビンタンから近く、確かに好立地',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('comments')->insert([
            'user_id' => '2',
            'accomodation_id' => '2',
            'comment' => 'ベランダからツインタワーが見れるの最高。夜お酒飲みながらも良いですよ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('comments')->insert([
            'user_id' => '1',
            'accomodation_id' => '3',
            'comment' => '１泊1000円弱なので最高ですね',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        
    }
}
