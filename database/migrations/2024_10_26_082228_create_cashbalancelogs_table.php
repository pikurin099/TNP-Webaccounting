<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::create('cashbalancelogs', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->unsignedBigInteger('category_id')->nullable(); // カテゴリID
            $table->unsignedBigInteger('user_id')->nullable(); // ユーザーID
            $table->string('title')->nullable(); // タイトル
            $table->date('date'); // 日付
            $table->integer('cash_type_10000')->nullable(); // 10000円札
            $table->integer('cash_type_5000')->nullable(); // 5000円札
            $table->integer('cash_type_1000')->nullable(); // 1000円札
            $table->integer('cash_type_500')->nullable(); // 500円硬貨
            $table->integer('cash_type_100')->nullable(); // 100円硬貨
            $table->integer('cash_type_50')->nullable(); // 50円硬貨
            $table->integer('cash_type_10')->nullable(); // 10円硬貨
            $table->integer('cash_type_5')->nullable(); // 5円硬貨
            $table->integer('cash_type_1')->nullable(); // 1円硬貨
            $table->timestamps(); // created_atとupdated_atカラム
        });
        Schema::table('cashbalancelogs', function (Blueprint $table) {
            $table->string('writer')->nullable(); // writerカラムを追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cashbalancelogs', function (Blueprint $table){
            $table->dropColumn('writer');
        });
    }
};
