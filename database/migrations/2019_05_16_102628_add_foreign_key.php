<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 管理者系 ===============
        // ユーザ系 ===============

        // 顧客
        Schema::table('users', function (Blueprint $table) {
            $table->integer('userAddress_id')->unsigned();
            $table->foreign('userAddress_id')
            ->references('id')
            ->on('userAddress')
            ->onDelete('cascade');
        });

        // 入金口座
        Schema::table('bank', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // アドレス帳
        Schema::table('addressBook', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->integer('prefecture_id')->unsigned();
            $table->foreign('prefecture_id')
            ->references('id')
            ->on('prefecture')
            ->onDelete('cascade');
        });

        // 本住所
        Schema::table('userAddress', function (Blueprint $table) {
            $table->integer('addressBook_id')->unsigned();
            $table->foreign('addressBook_id')
            ->references('id')
            ->on('addressBook')
            ->onDelete('cascade');
        });

        // 都道府県コード
        Schema::table('prefecture', function (Blueprint $table) {
        });

        // 本人確認送信
        Schema::table('sendPhoto', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // 本人確認完了
        Schema::table('verifyPhoto', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // 管理者系 ===============

        // 案件
        Schema::table('case', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->integer('paymentWay_id')->unsigned();
            $table->foreign('paymentWay_id')
            ->references('id')
            ->on('paymentWay')
            ->onDelete('cascade');
        });

        // 入金方法
        Schema::table('paymentWay', function (Blueprint $table) {
        });

        // 荷受け申請
        Schema::table('applyGoods', function (Blueprint $table) {
            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')
            ->references('id')
            ->on('case')
            ->onDelete('cascade');
        });

        // 集荷申請
        Schema::table('collection', function (Blueprint $table) {
            $table->integer('applyGoods_id')->unsigned();
            $table->foreign('applyGoods_id')
            ->references('id')
            ->on('applyGoods')
            ->onDelete('cascade');
            $table->integer('collectionTime_id')->unsigned();
            $table->foreign('collectionTime_id')
            ->references('id')
            ->on('collectionTime')
            ->onDelete('cascade');
        });

        // 集荷時間帯
        Schema::table('collectionTime', function (Blueprint $table) {
        });

        // ロッカー予約
        Schema::table('reserveLocker', function (Blueprint $table) {
            $table->integer('lockerNum_id')->unsigned();
            $table->foreign('lockerNum_id')
            ->references('id')
            ->on('lockerNum')
            ->onDelete('cascade');
            $table->integer('applyGoods_id')->unsigned();
            $table->foreign('applyGoods_id')
            ->references('id')
            ->on('applyGoods')
            ->onDelete('cascade');
        });

        // ロッカー番号
        Schema::table('lockerNum', function (Blueprint $table) {
            $table->integer('lockerPlace_id')->unsigned();
            $table->foreign('lockerPlace_id')
            ->references('id')
            ->on('lockerPlace')
            ->onDelete('cascade');
        });

        // ロッカー場所
        Schema::table('lockerPlace', function (Blueprint $table) {
        });

        // フラグ系 ===============

        // 集荷依頼済み
        Schema::table('applyDone', function (Blueprint $table) {
            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')
            ->references('id')
            ->on('case')
            ->onDelete('cascade');
        });

        // 了承確認済み
        Schema::table('approveDone', function (Blueprint $table) {
            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')
            ->references('id')
            ->on('case')
            ->onDelete('cascade');
        });

        // キャンセル
        Schema::table('cancel', function (Blueprint $table) {
            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')
            ->references('id')
            ->on('case')
            ->onDelete('cascade');
        });

        // 入金済み
        Schema::table('paymentDone', function (Blueprint $table) {
            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')
            ->references('id')
            ->on('case')
            ->onDelete('cascade');
        });

        // 査定系 ===============

        // 査定
        Schema::table('assessment', function (Blueprint $table) {
            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')
            ->references('id')
            ->on('case')
            ->onDelete('cascade');
            $table->integer('shippingCost_id')->unsigned();
            $table->foreign('shippingCost_id')
            ->references('id')
            ->on('shippingCost')
            ->onDelete('cascade');
            $table->integer('coupen_id')->unsigned();
            $table->foreign('coupen_id')
            ->references('id')
            ->on('coupen')
            ->onDelete('cascade');
        });

        // 送料
        Schema::table('shippingCost', function (Blueprint $table) {
        });

        // クーポン
        Schema::table('coupen', function (Blueprint $table) {
        });

        // 査定明細
        Schema::table('assessmentDetail', function (Blueprint $table) {
            $table->integer('assessment_id')->unsigned();
            $table->foreign('assessment_id')
            ->references('id')
            ->on('assessment')
            ->onDelete('cascade');
            $table->integer('goods_id')->unsigned();
            $table->foreign('goods_id')
            ->references('id')
            ->on('goods')
            ->onDelete('cascade');
        });

        // 商品
        Schema::table('goods', function (Blueprint $table) {
            $table->integer('condition_id')->unsigned();
            $table->foreign('condition_id')
            ->references('id')
            ->on('condition')
            ->onDelete('cascade');
            $table->integer('title_id')->unsigned();
            $table->foreign('title_id')
            ->references('id')
            ->on('title')
            ->onDelete('cascade');
        });

        // コンディション
        Schema::table('condition', function (Blueprint $table) {
        });

        // タイトル
        Schema::table('title', function (Blueprint $table) {
        });

        // 了承
        Schema::table('approveGoods', function (Blueprint $table) {
            $table->integer('assessmentDetail_id')->unsigned();
            $table->foreign('assessmentDetail_id')
            ->references('id')
            ->on('assessmentDetail')
            ->onDelete('cascade');
        });

        // 返送
        Schema::table('resendGoods', function (Blueprint $table) {
            $table->integer('assessmentDetail_id')->unsigned();
            $table->foreign('assessmentDetail_id')
            ->references('id')
            ->on('assessmentDetail')
            ->onDelete('cascade');
            $table->integer('userAddress_id')->unsigned();
            $table->foreign('userAddress_id')
            ->references('id')
            ->on('userAddress')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
