<?php

use Illuminate\Database\Seeder;

class AccomodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accomodations')->insert([
            'user_id' => '1',
            'name' =>  'ボルテックス スイーツ KLCC クアラルンプール ホテル＆サービゼズ',
            'category_id' => '1',
            'summary' => '目の前がKLツインタワーで、最高の立地。コスパも最高',
            'url' => 'https://goo.gl/maps/hzBPe54e88bHJzaQ7',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('accomodations')->insert([
            'user_id' => '2',
            'name' =>  'ジ オハナ スイート',
            'category_id' => '1',
            'summary' => '個室は3000円ほどで2〜4人は泊まれる広さ。コスパも立地も最高。',
            'url' => 'https://goo.gl/maps/56AjmG59uKpjzxno9',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('accomodations')->insert([
            'user_id' => '3',
            'name' =>  'Cactus Garden Homestay',
            'category_id' => '3',
            'summary' => '海から近く、オーナーも親切で良い方。宿泊代もコスパ最高です！',
            'url' => 'https://goo.gl/maps/ztuqyQ2JtW8Rjx3v5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
