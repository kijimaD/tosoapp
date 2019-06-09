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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // 外部キー制約を無視

        \App\User::create([
        'family_name' => '佐藤',
        'name' => '一太郎',
        'email' => 'norimaking777@gmail.com',
        'password' => bcrypt('11qqaazz'),
        'email_verified_at' => '2019-05-19 18:17:15'
      ]);

        \App\User::create([
        'family_name' => '藤原',
        'name' => '次郎',
        'email' => 'k9887039@kadai.jp',
        'password' => bcrypt('11qqaazz'),
        'email_verified_at' => '2019-05-19 18:17:15'
      ]);

        \App\Admin::create([
        'name' => '管理者',
        'email' => 'norimaking777@gmail.com',
        'password' => bcrypt('11qqaazz')
      ]);

        \App\Addressbook::create([
          'zip' => '8900081',
          'city' => '鹿児島市唐湊4丁目',
          'address' => '14-26塩満アパート',
          'user_id' => '1',
          'prefecture_id' => '45',
        ]);

        \App\Addressbook::create([
          'zip' => '8900023',
          'city' => 'あああ街',
          'address' => 'あああアパート',
          'user_id' => '1',
          'prefecture_id' => '44',
        ]);

        \App\Bank::create([
          'bank_name' => '鹿児島銀行',
          'bank_branch' => '阿久根',
          'bank_type' => '普通',
          'bank_num' => '4302939',
          'user_id' => '1',
        ]);

        \App\Bank::create([
          'bank_name' => 'ぎぎ銀行',
          'bank_branch' => 'ああ',
          'bank_type' => '普通',
          'bank_num' => '9918999',
          'user_id' => '1',
        ]);

        \App\Entry::create([
          'user_id' => '1',
          'paymentway_id' => '1',
          'shippingway_id' => '1',
        ]);

        \App\Assessment::create([
          'entry_id' => '1',
          'coupen_id' => '1',
          'shippingcost_id' => '1',
        ]);

        \App\Shippingcost::create([
          'shippingcost_type' => '20冊以上で無料',
          'cost' => '1200',
          'apply_cost' => '0',
        ]);

        \App\Assessmentdetail::create([
          'assessment_id' => '1',
          'goods_id' => '1',
        ]);
        \App\Assessmentdetail::create([
          'assessment_id' => '1',
          'goods_id' => '2',
        ]);
        \App\Assessmentdetail::create([
          'assessment_id' => '1',
          'goods_id' => '3',
        ]);
        \App\Assessmentdetail::create([
          'assessment_id' => '1',
          'goods_id' => '4',
        ]);

        \App\Goods::create([
          'market_price' => '1000',
          'sell_price' => '1000',
          'get_price' => '300',
          'title_id' => '1',
        ]);
        \App\Goods::create([
          'market_price' => '1200',
          'sell_price' => '1200',
          'get_price' => '350',
          'title_id' => '2',
        ]);
        \App\Goods::create([
          'market_price' => '1500',
          'sell_price' => '1440',
          'get_price' => '400',
          'title_id' => '3',
        ]);
        \App\Goods::create([
          'market_price' => '400',
          'sell_price' => '400',
          'get_price' => '120',
          'title_id' => '4',
        ]);

        \App\Title::create([
          'isbn' => '9784274065972',
        ]);
        \App\Title::create([
          'isbn' => '9784939204802',
        ]);
        \App\Title::create([
          'isbn' => '9784382040234',
        ]);
        \App\Title::create([
          'isbn' => '9784333330224',
        ]);

        // 定数データ系--------------------

        \App\Paymentway::create([
          'payment_way' => '銀行振込',
        ]);
        \App\Paymentway::create([
          'payment_way' => 'Amazonギフト券',
        ]);

        \App\Shippingway::create([
          'shipping_way' => '集荷'
        ]);
        \App\Shippingway::create([
          'shipping_way' => '専用ロッカー'
        ]);
        \App\Shippingway::create([
          'shipping_way' => '自分で送る'
        ]);

        \App\Condition::create([
            'condition_code' => '非常に良い',
            'condition_percent' => '0.35',
          ]);
        \App\Condition::create([
            'condition_code' => '良い',
            'condition_percent' => '0.30',
          ]);
        \App\Condition::create([
            'condition_code' => '可',
            'condition_percent' => '0.20',
          ]);
        \App\Condition::create([
            'condition_code' => 'ギリ可',
            'condition_percent' => '0.1',
          ]);
        \App\Condition::create([
            'condition_code' => '不可',
            'condition_percent' => '0',
          ]);

        \App\Coupen::create([
          'coupen_name' => 'なし',
          'coupen_value' => '1.00',
        ]);
        \App\Coupen::create([
          'coupen_name' => 'Ti0020',
          'coupen_value' => '1.15',
        ]);
        \App\Coupen::create([
          'coupen_name' => 'Te0022',
          'coupen_value' => '1.15',
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
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}


// \App\Addressbook::create([
//           '' => '',
//           '' => '',
//           '' => '',
//           '' => '',
//           '' => '',
//           '' => '',
//           '' => '',
//         ]);
