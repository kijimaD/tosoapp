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
            $table->bigIncrements('id');
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
            $table->bigIncrements('id');
            $table->integer('user_num')->nullable();
            $table->string('family_name');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->integer('userAddress_id')->unsigned();
            $table->foreign('userAddress_id')->references('id')->on('userAddress');
        });

        // 入金口座
        Schema::create('bank', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('bank_type');
            $table->string('bank_num');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        // アドレス帳
        Schema::create('addressBook', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('zip');
            $table->integer('prefecture_id')->unsigned();
            $table->foreign('prefecture_id')->references('id')->on('prefecture');
            $table->string('city');
            $table->string('address');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        // 本住所
        Schema::create('userAddress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->foreign('addressBook_id')->unsigned();
            $table->foreign('addressBook_id')->references(id)->on('addressBook');
        }); // 本住所

        // 本人確認送信
        Schema::create('sendPhoto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        // 本人確認完了
        Schema::create('verifyPhoto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        // 買取系輸送 ===============
        // 案件
        Schema::create('case', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('case_num')->nullable(); // どうやってコードを振る？
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('paymentWay_id')->unsigned();
            $table->foreign('paymentWay_id')->references('id')->on('paymentWay');
        });

        // 入金方法
        Schema::create('paymentWay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_way');
        });

        // 荷受け申請
        Schema::create('applyGoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('id')->on('case');
        });

        // 集荷申請
        Schema::create('collection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('collection_num')->nullable(); // どうやってコードを振る？
            $table->date('collection_day');
            $table->integer('box_num');
            $table->timestamps();

            $table->integer('applyGoods_id')->unsigned();
            $table->foreign('applyGoods_id')->references('id')->on('applyGoods');
            $table->integer('collectionTime_id')->unsigned();
            $table->foreign('collectionTime_id')->references('id')->on('collectionTime');
        });

        // 集荷時間帯
        Schema::create('collectionTime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('collection_time');
        });

        // ロッカー予約
        Schema::create('reserveLocker', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('reserve_day');
            $table->string('reserve_time');
            $table->timestamps();

            $table->integer('lockerNum_id')->unsigned();
            $table->foreign('lockerNum_id')->references('id')->on('lockerNum');
            $table->integer('applyGoods_id')->unsigned();
            $table->foreign('applyGoods_id')->references('id')->on('applyGoods');
        });

        // ロッカー番号
        Schema::create('lockerNum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('num');
            $table->timestamps();

            $table->integer('lockerPlace_id')->unsigned();
            $table->foreign('lockerPlace_id')->references('id')->on('lockerPlace');
        });

        // ロッカー場所
        Schema::create('lockerPlace', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('place');
            $table->timestamps();
        });

        // フラグ系 ===============
        // 集荷委託済み
        Schema::create('applyDone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('id')->on('case');
        });

        // 了承確認済み
        Schema::create('approveDone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('id')->on('case');
        });

        // キャンセル
        Schema::create('cancel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('id')->on('case');
        });

        // 入金済み
        Schema::create('paymentDone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('id')->on('case');
        });

        // 査定系 ==============
        // 査定
        Schema::create('assessment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sum_price');
            $table->timestamps();

            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('id')->on('case');
            $table->integer('shippingCost_id')->unsigned();
            $table->foreign('shippingCost_id')->references('id')->on('shippingCost');
            $table->integer('coupen_id')->unsigned();
            $table->foreign('coupen_id')->references('id')->on('coupen');
        });

        // 送料
        Schema::create('shippingCost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shippingCost_type');
            $table->integer('cost');
            $table->integer('apply_cost');
            $table->timestamps();
        });

        // クーポン
        Schema::create('coupen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupen_name');
            $table->double('coupen_value');
            $table->timestamps();
        });

        // 査定明細
        Schema::create('assessmentDetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->timestamps();

            $table->integer('assessment_id')->unsigned();
            $table->foreign('assessment_id')->references('id')->on('assessment');
            $table->integer('goods_id')->unsigned();
            $table->foreign('goods_id')->references('id')->on('goods');
        });

        // 商品
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->integer('market_price');
            $table->integer('sell_price');
            $table->integer('get_price');
            $table->timestamps();

            $table->integer('condition_id')->unsigned();
            $table->foreign('condition_id')->references('id')->on('condition');
            $table->integer('title_id')->unsigned();
            $table->foreign('title_id')->references('id')->on('title');
        });

        // コンディション
        Schema::create('condition', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('condition_code');
            $table->double('condition_percent');
            $table->timestamps();
        });

        // タイトル
        Schema::create('title', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn');
            $table->string('title_name');
            $table->timestamps();
        });

        // 了承
        Schema::create('approveGoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('assessmentDetail_id')->unsigned();
            $table->foreign('assessmentDetail_id')->references('id')->on('assessmentDetail');
        });

        // 返送
        Schema::create('resendGoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('why_resend');
            $table->timestamps();

            $table->integer('assessmentDetail_id')->unsigned();
            $table->foreign('assessmentDetail_id')->references('id')->on('assessmentDetail');
            $table->integer('userAddress_id')->unsigned();
            $table->foreign('userAddress_id')->references('id')->on('userAddress');
        });

        // Schema::create('', function (Blueprint $table) {
        //     $table->bigIncrements('id');
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
