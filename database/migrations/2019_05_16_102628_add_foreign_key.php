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
        });

        // 入金口座
        Schema::table('banks', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        Schema::table('defaultBanks', function (Blueprint $table) {
            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')
            ->references('id')
            ->on('banks')
            ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // アドレス帳
        Schema::table('addressBooks', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->integer('prefecture_id')->unsigned();
            $table->foreign('prefecture_id')
            ->references('id')
            ->on('prefectures')
            ->onDelete('cascade');
        });

        // 本住所、既定のアドレス
        Schema::table('userAddresses', function (Blueprint $table) {
            $table->integer('addressBook_id')->unsigned();
            $table->foreign('addressBook_id')
            ->references('id')
            ->on('addressBooks')
            ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // 都道府県コード
        Schema::table('prefectures', function (Blueprint $table) {
        });

        // 本人確認送信
        Schema::table('sendPhotos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // 本人確認完了
        Schema::table('verifyPhotos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // 管理者系 ===============

        // 案件
        Schema::table('entries', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->integer('paymentway_id')->unsigned();
            $table->foreign('paymentway_id')
            ->references('id')
            ->on('paymentways')
            ->onDelete('cascade');
            $table->integer('shippingway_id')->unsigned();
            $table->foreign('shippingway_id')
            ->references('id')
            ->on('shippingways')
            ->onDelete('cascade');
        });

        // 入金方法
        Schema::table('paymentWays', function (Blueprint $table) {
        });

        // 支払い口座
        Schema::table('paymentBanks', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')
            ->references('id')
            ->on('banks')
            ->onDelete('cascade');
        });

        // 荷受け申請
        Schema::table('applyGoods', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // 集荷申請
        Schema::table('collections', function (Blueprint $table) {
            $table->integer('applyGoods_id')->unsigned();
            $table->foreign('applyGoods_id')
            ->references('id')
            ->on('applyGoods')
            ->onDelete('cascade');
            $table->integer('addressBook_id')->unsigned();
            $table->foreign('addressBook_id')
            ->references('id')
            ->on('addressBooks')
            ->onDelete('cascade');
            // $table->integer('collectionTime_id')->unsigned();
            // $table->foreign('collectionTime_id')
            // ->references('id')
            // ->on('collectionTimes')
            // ->onDelete('cascade');
        });

        // // 集荷時間帯
        // Schema::table('collectionTimes', function (Blueprint $table) {
        // });

        // ロッカー予約
        Schema::table('reserveLockers', function (Blueprint $table) {
            $table->integer('lockerNum_id')->unsigned();
            $table->foreign('lockerNum_id')
            ->references('id')
            ->on('lockerNums')
            ->onDelete('cascade');
            $table->integer('applyGoods_id')->unsigned();
            $table->foreign('applyGoods_id')
            ->references('id')
            ->on('applyGoods')
            ->onDelete('cascade');
        });

        // ロッカー番号
        Schema::table('lockerNums', function (Blueprint $table) {
            $table->integer('lockerPlace_id')->unsigned();
            $table->foreign('lockerPlace_id')
            ->references('id')
            ->on('lockerPlaces')
            ->onDelete('cascade');
        });

        // ロッカー場所
        Schema::table('lockerPlaces', function (Blueprint $table) {
        });

        // フラグ系 ===============

        // 集荷依頼済み
        Schema::table('applyDones', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // 了承確認済み
        Schema::table('approveDones', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // キャンセル
        Schema::table('cancels', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // 入金済み
        Schema::table('paymentDones', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // 査定系 ===============

        // 査定
        Schema::table('assessments', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
            $table->integer('shippingCost_id')->unsigned();
            $table->foreign('shippingCost_id')
            ->references('id')
            ->on('shippingCosts')
            ->onDelete('cascade');
            $table->integer('coupen_id')->unsigned();
            $table->foreign('coupen_id')
            ->references('id')
            ->on('coupens')
            ->onDelete('cascade');
        });

        // 送料
        Schema::table('shippingCosts', function (Blueprint $table) {
        });

        // クーポン
        Schema::table('coupens', function (Blueprint $table) {
        });

        // 査定明細
        Schema::table('assessmentDetails', function (Blueprint $table) {
            $table->integer('assessment_id')->unsigned();
            $table->foreign('assessment_id')
            ->references('id')
            ->on('assessments')
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
            ->on('conditions')
            ->onDelete('cascade');
            $table->integer('title_id')->unsigned();
            $table->foreign('title_id')
            ->references('id')
            ->on('titles')
            ->onDelete('cascade');
        });

        // コンディション
        Schema::table('conditions', function (Blueprint $table) {
        });

        // タイトル
        Schema::table('titles', function (Blueprint $table) {
        });

        // 了承
        Schema::table('approveGoods', function (Blueprint $table) {
            $table->integer('assessmentDetail_id')->unsigned();
            $table->foreign('assessmentDetail_id')
            ->references('id')
            ->on('assessmentDetails')
            ->onDelete('cascade');
        });

        // 返送
        Schema::table('resendGoods', function (Blueprint $table) {
            $table->integer('assessmentDetail_id')->unsigned();
            $table->foreign('assessmentDetail_id')
            ->references('id')
            ->on('assessmentDetails')
            ->onDelete('cascade');
            $table->integer('userAddress_id')->unsigned();
            $table->foreign('userAddress_id')
            ->references('id')
            ->on('userAddresses')
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
