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
        \App\User::create([
        'family_name' => '佐藤',
        'name' => '太郎',
        'email' => 'norimaking777@gmail.com',
        'password' => bcrypt('11qqaazz')
      ]);

        \App\Admin::create([
        'name' => '管理者',
        'email' => 'norimaking777@gmail.com',
        'password' => bcrypt('11qqaazz')
      ]);

        DB::table('prefectures')->insert([
          [
          'prefecture_code' => '01',
          'prefecture_name' => '北海道'
          ],
          [
          'prefecture_code' => '02',
          'prefecture_name' => '青森県'
          ],
          [
          'prefecture_code' => '03',
          'prefecture_name' => '岩手県'
          ],
          [
          'prefecture_code' => '04',
          'prefecture_name' => '宮城県'
          ],
          [
          'prefecture_code' => '05',
          'prefecture_name' => '秋田県'
          ],
          [
          'prefecture_code' => '06',
          'prefecture_name' => '山形県'
          ],
          [
          'prefecture_code' => '07',
          'prefecture_name' => '福島県'
          ],
          [
          'prefecture_code' => '09',
          'prefecture_name' => '栃木県'
          ],
          [
          'prefecture_code' => '10',
          'prefecture_name' => '群馬県'
          ],
          [
          'prefecture_code' => '11',
          'prefecture_name' => '埼玉県'
          ],
          [
          'prefecture_code' => '12',
          'prefecture_name' => '千葉県'
          ],
          [
          'prefecture_code' => '13',
          'prefecture_name' => '東京都'
          ],
          [
          'prefecture_code' => '14',
          'prefecture_name' => '神奈川県'
          ],
          [
          'prefecture_code' => '15',
          'prefecture_name' => '新潟県'
          ],
          [
          'prefecture_code' => '16',
          'prefecture_name' => '富山県'
          ],
          [
          'prefecture_code' => '17',
          'prefecture_name' => '石川県'
          ],
          [
          'prefecture_code' => '18',
          'prefecture_name' => '福井県'
          ],
          [
          'prefecture_code' => '19',
          'prefecture_name' => '山梨県'
          ],
          [
          'prefecture_code' => '20',
          'prefecture_name' => '長野県'
          ],
          [
          'prefecture_code' => '21',
          'prefecture_name' => '岐阜県'
          ],
          [
          'prefecture_code' => '22',
          'prefecture_name' => '静岡県'
          ],
          [
          'prefecture_code' => '23',
          'prefecture_name' => '愛知県'
          ],
          [
          'prefecture_code' => '24',
          'prefecture_name' => '三重県'
          ],
          [
          'prefecture_code' => '25',
          'prefecture_name' => '滋賀県'
          ],
          [
          'prefecture_code' => '26',
          'prefecture_name' => '京都府'
          ],
          [
          'prefecture_code' => '27',
          'prefecture_name' => '大阪府'
          ],
          [
          'prefecture_code' => '28',
          'prefecture_name' => '兵庫県'
          ],
          [
          'prefecture_code' => '29',
          'prefecture_name' => '奈良県'
          ],
          [
          'prefecture_code' => '30',
          'prefecture_name' => '和歌山県'
          ],
          [
          'prefecture_code' => '31',
          'prefecture_name' => '鳥取県'
          ],
          [
          'prefecture_code' => '32',
          'prefecture_name' => '島根県'
          ],
          [
          'prefecture_code' => '33',
          'prefecture_name' => '岡山県'
          ],
          [
          'prefecture_code' => '34',
          'prefecture_name' => '広島県'
          ],
          [
          'prefecture_code' => '35',
          'prefecture_name' => '山口県'
          ],
          [
          'prefecture_code' => '36',
          'prefecture_name' => '徳島県'
          ],
          [
          'prefecture_code' => '37',
          'prefecture_name' => '香川県'
          ],
          [
          'prefecture_code' => '38',
          'prefecture_name' => '愛媛県'
          ],
          [
          'prefecture_code' => '39',
          'prefecture_name' => '高知県'
          ],
          [
          'prefecture_code' => '40',
          'prefecture_name' => '福岡県'
          ],
          [
          'prefecture_code' => '41',
          'prefecture_name' => '佐賀県'
          ],
          [
          'prefecture_code' => '42',
          'prefecture_name' => '長崎県'
          ],                                                                                      [
          'prefecture_code' => '43',
          'prefecture_name' => '熊本県'
          ],
          [
          'prefecture_code' => '44',
          'prefecture_name' => '大分県'
          ],
          [
          'prefecture_code' => '45',
          'prefecture_name' => '宮崎県'
          ],
          [
          'prefecture_code' => '46',
          'prefecture_name' => '鹿児島県'
          ],
          [
          'prefecture_code' => '47',
          'prefecture_name' => '沖縄県'
          ],
        ]);
    }
}