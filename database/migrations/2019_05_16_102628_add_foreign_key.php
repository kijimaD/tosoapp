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

        Schema::table('defaultbanks', function (Blueprint $table) {
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
        Schema::table('addressbooks', function (Blueprint $table) {
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
        Schema::table('useraddresses', function (Blueprint $table) {
            $table->integer('addressbook_id')->unsigned();
            $table->foreign('addressbook_id')
            ->references('id')
            ->on('addressbooks')
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
        Schema::table('sendphotos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        // 本人確認完了
        Schema::table('verifyphotos', function (Blueprint $table) {
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
        Schema::table('paymentways', function (Blueprint $table) {
        });

        // 支払い口座
        Schema::table('paymentbanks', function (Blueprint $table) {
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
        Schema::table('applygoods', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // 集荷申請
        Schema::table('collections', function (Blueprint $table) {
            $table->integer('applygoods_id')->unsigned();
            $table->foreign('applygoods_id')
            ->references('id')
            ->on('applygoods')
            ->onDelete('cascade');
            $table->integer('addressbook_id')->unsigned();
            $table->foreign('addressbook_id')
            ->references('id')
            ->on('addressbooks')
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
        Schema::table('reservelockers', function (Blueprint $table) {
            $table->integer('lockernum_id')->unsigned();
            $table->foreign('lockernum_id')
            ->references('id')
            ->on('lockernums')
            ->onDelete('cascade');
            $table->integer('applygoods_id')->unsigned();
            $table->foreign('applygoods_id')
            ->references('id')
            ->on('applygoods')
            ->onDelete('cascade');
        });

        // ロッカー番号
        Schema::table('lockernums', function (Blueprint $table) {
            $table->integer('lockerplace_id')->unsigned();
            $table->foreign('lockerplace_id')
            ->references('id')
            ->on('lockerplaces')
            ->onDelete('cascade');
        });

        // ロッカー場所
        Schema::table('lockerplaces', function (Blueprint $table) {
        });

        // フラグ系 ===============

        // 集荷依頼済み
        Schema::table('applydones', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // 査定完了
        Schema::table('assessmentdones', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
            ->references('id')
            ->on('entries')
            ->onDelete('cascade');
        });

        // 了承確認済み
        Schema::table('approvedones', function (Blueprint $table) {
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
        Schema::table('paymentdones', function (Blueprint $table) {
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
            $table->integer('coupen_id')->unsigned();
            $table->foreign('coupen_id')
            ->references('id')
            ->on('coupens')
            ->onDelete('cascade');
            $table->integer('shippingcost_id')->unsigned();
            $table->foreign('shippingcost_id')
            ->references('id')
            ->on('shippingcosts')
            ->onDelete('cascade');
        });

        // 送料
        Schema::table('shippingcosts', function (Blueprint $table) {
        });

        // クーポン
        Schema::table('coupens', function (Blueprint $table) {
        });

        // 査定明細
        Schema::table('assessmentdetails', function (Blueprint $table) {
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
            $table->integer('condition_id')->unsigned()->nullable();
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

        // 了承商品
        Schema::table('approvegoods', function (Blueprint $table) {
            $table->integer('assessmentdetail_id')->unsigned();
            $table->foreign('assessmentdetail_id')
            ->references('id')
            ->on('assessmentdetails')
            ->onDelete('cascade');
        });

        // 返送商品
        Schema::table('resendgoods', function (Blueprint $table) {
            $table->integer('assessmentdetail_id')->unsigned();
            $table->foreign('assessmentdetail_id')
            ->references('id')
            ->on('assessmentdetails')
            ->onDelete('cascade');
        });

        // 返送完了商品
        Schema::table('resenddonegoods', function (Blueprint $table) {
            $table->integer('resendgoods_id')->unsigned();
            $table->foreign('resendgoods_id')
            ->references('id')
            ->on('resendgoods')
            ->onDelete('cascade');
        });

        // 入庫系　=============
        Schema::table('receipts', function (Blueprint $table) {
            $table->integer('approvegoods_id')->unsigned();
            $table->foreign('approvegoods_id')
            ->references('id')
            ->on('approvegoods')
            ->onDelete('cascade');

            $table->integer('goods_id')->unsigned();
            $table->foreign('goods_id')
            ->references('id')
            ->on('goods')
            ->onDelete('cascade');

            $table->integer('storagestructure_id')->unsigned();
            $table->foreign('storagestructure_id')
            ->references('id')
            ->on('storagestructures')
            ->onDelete('cascade');
        });

        Schema::table('storagestructures', function (Blueprint $table) {
            $table->integer('warehouse_id')->unsigned();
            $table->foreign('warehouse_id')
            ->references('id')
            ->on('warehouses')
            ->onDelete('cascade');

            $table->integer('rack_id')->unsigned();
            $table->foreign('rack_id')
            ->references('id')
            ->on('racks')
            ->onDelete('cascade');

            $table->integer('stage_id')->unsigned();
            $table->foreign('stage_id')
            ->references('id')
            ->on('stages')
            ->onDelete('cascade');
        });

        Schema::table('warehouses', function (Blueprint $table) {
        });

        Schema::table('racks', function (Blueprint $table) {
        });

        Schema::table('stages', function (Blueprint $table) {
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
