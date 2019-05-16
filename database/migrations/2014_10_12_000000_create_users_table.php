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
        Schema::create('bank', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('bank_type');
            $table->string('bank_num');
            $table->timestamps();
        });

        // アドレス帳
        Schema::create('addressBook', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('zip');
            $table->string('city');
            $table->string('address');
            $table->timestamps();
        });

        // 本住所
        Schema::create('userAddress', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 都道府県コード
        Schema::create('prefecture', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('prefecture_code');
            $table->string('prefecture_name');
        });


        // 本人確認送信
        Schema::create('sendPhoto', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 本人確認完了
        Schema::create('verifyPhoto', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 買取系輸送 ===============
        // 案件
        Schema::create('case', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('case_num')->nullable(); // どうやってコードを振る？
            $table->timestamps();
        });

        // 入金方法
        Schema::create('paymentWay', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('payment_way');
        });

        // 荷受け申請
        Schema::create('applyGoods', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 集荷申請
        Schema::create('collection', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('collection_num')->nullable(); // どうやってコードを振る？
            $table->date('collection_day');
            $table->integer('box_num');
            $table->timestamps();
        });

        // 集荷時間帯
        Schema::create('collectionTime', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('collection_time');
        });

        // ロッカー予約
        Schema::create('reserveLocker', function (Blueprint $table) {
            $table->Increments('id');
            $table->date('reserve_day');
            $table->string('reserve_time');
            $table->timestamps();
        });

        // ロッカー番号
        Schema::create('lockerNum', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('num');
            $table->timestamps();
        });

        // ロッカー場所
        Schema::create('lockerPlace', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('place');
            $table->timestamps();
        });

        // フラグ系 ===============
        // 集荷委託済み
        Schema::create('applyDone', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 了承確認済み
        Schema::create('approveDone', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // キャンセル
        Schema::create('cancel', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 入金済み
        Schema::create('paymentDone', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
        });

        // 査定系 ==============
        // 査定
        Schema::create('assessment', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('sum_price');
            $table->timestamps();
        });

        // 送料
        Schema::create('shippingCost', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('shippingCost_type');
            $table->integer('cost');
            $table->integer('apply_cost');
            $table->timestamps();
        });

        // クーポン
        Schema::create('coupen', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('coupen_name');
            $table->double('coupen_value');
            $table->timestamps();
        });

        // 査定明細
        Schema::create('assessmentDetail', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('price');
            $table->timestamps();
        });

        // 商品
        Schema::create('goods', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('description');
            $table->integer('market_price');
            $table->integer('sell_price');
            $table->integer('get_price');
            $table->timestamps();
        });

        // コンディション
        Schema::create('condition', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('condition_code');
            $table->double('condition_percent');
            $table->timestamps();
        });

        // タイトル
        Schema::create('title', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('isbn');
            $table->string('title_name');
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
            $table->string('why_resend');
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
