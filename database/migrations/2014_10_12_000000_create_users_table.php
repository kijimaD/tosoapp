<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 管理者系 ===============
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // ユーザ系 ===============
        // 顧客
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_num')->nullable();
            $table->string('family_name');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // 入金口座
        Schema::create('banks', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('bank_type');
            $table->string('bank_num');
            $table->timestamps();
        });

        // 既定の入金口座
        Schema::create('defaultBanks', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // アドレス帳
        Schema::create('addressBooks', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('zip');
            $table->string('city');
            $table->string('address');
            $table->timestamps();
        });

        // 本住所
        Schema::create('userAddresses', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 都道府県コード
        Schema::create('prefectures', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('prefecture_code');
            $table->string('prefecture_name');
        });


        // 本人確認送信
        Schema::create('sendPhotos', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 本人確認完了
        Schema::create('verifyPhotos', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 買取系輸送 ===============
        // 案件
        Schema::create('entries', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('entry_num')->nullable(); // どうやってコードを振る？
            $table->timestamps();
        });

        // 入金方法
        Schema::create('paymentWays', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('payment_way');
            $table->timestamps();
        });

        // 輸送方法
        Schema::create('shippingWays', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('shipping_way');
            $table->timestamps();
        });

        // 支払い口座
        Schema::create('paymentBanks', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 荷受け申請
        Schema::create('applyGoods', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 集荷申請
        Schema::create('collections', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('collection_num')->nullable(); // どうやってコードを振る？
            $table->date('collection_day');
            $table->string('collection_time');
            $table->integer('box_num');
            $table->timestamps();
        });

        // // 集荷時間帯
        // Schema::create('collectionTimes', function (Blueprint $table) {
        //     $table->Increments('id');
        // });

        // ロッカー予約
        Schema::create('reserveLockers', function (Blueprint $table) {
            $table->Increments('id');
            $table->date('reserve_day');
            $table->string('reserve_time');
            $table->timestamps();
        });

        // ロッカー番号
        Schema::create('lockerNums', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('num');
            $table->timestamps();
        });

        // ロッカー場所
        Schema::create('lockerPlaces', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('place');
            $table->timestamps();
        });

        // フラグ系 ===============
        // 集荷委託済み
        Schema::create('applyDones', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 査定完了
        Schema::create('assessmentDones', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 了承確認済み
        Schema::create('approveDones', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // キャンセル
        Schema::create('cancels', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 入金済み
        Schema::create('paymentDones', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 査定系 ==============
        // 査定
        Schema::create('assessments', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('sum_price')->nullable();
            $table->timestamps();
        });

        // 送料
        Schema::create('shippingCosts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('shippingcost_type');
            $table->integer('cost');
            $table->integer('apply_cost');
            $table->timestamps();
        });

        // クーポン
        Schema::create('coupens', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('coupen_name');
            $table->double('coupen_value');
            $table->timestamps();
        });

        // 査定明細
        Schema::create('assessmentDetails', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('price')->nullable();
            $table->timestamps();
        });

        // 商品
        Schema::create('goods', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('description')->nullable();
            $table->integer('market_price')->nullable();
            $table->integer('sell_price')->nullable();
            $table->integer('get_price')->nullable();
            $table->timestamps();
        });

        // コンディション
        Schema::create('conditions', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('condition_code');
            $table->double('condition_percent');
            $table->timestamps();
        });

        // タイトル
        Schema::create('titles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('isbn')->nullable();
            $table->string('title_name')->nullable();
            $table->timestamps();
        });

        // 了承
        Schema::create('approveGoods', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 返送
        Schema::create('resendGoods', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 返送完了
        Schema::create('resenddoneGoods', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 入庫系 ==============
        // 入庫
        Schema::create('receipts', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 保管構造
        Schema::create('storagestructures', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 倉庫
        Schema::create('warehouses', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // 棚(x)
        Schema::create('racks', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // 段数(y)
        Schema::create('stages', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Schema::create('', function (Blueprint $table) {
        //     $table->Increments('id');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
