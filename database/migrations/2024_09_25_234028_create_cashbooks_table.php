<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('cashbooks', function (Blueprint $table) {
            $table->id(); // プライマリキー
            $table->timestamp('date'); // 日付
            $table->year('year')->notNullable(); // 年
            $table->integer('month')->notNullable(); // 月
            $table->text('description'); // 説明
            $table->integer('amount')->notNullable(); // 金額
            $table->enum('transaction_type', ['収入', '支出', '金庫管理'])->notNullable(); // 取引の種類
            $table->text('category'); // カテゴリ
            $table->integer('balance'); // 残高
            $table->integer('cash_type_10000')->default(0)->notNullable(); // 10000円札
            $table->integer('cash_type_5000')->default(0)->notNullable(); // 5000円札
            $table->integer('cash_type_1000')->default(0)->notNullable(); // 1000円札
            $table->integer('cash_type_500')->default(0)->notNullable(); // 500円玉
            $table->integer('cash_type_100')->default(0)->notNullable(); // 100円玉
            $table->integer('cash_type_50')->default(0)->notNullable(); // 50円玉
            $table->integer('cash_type_10')->default(0)->notNullable(); // 10円玉
            $table->integer('cash_type_5')->default(0)->notNullable(); // 5円玉
            $table->integer('cash_type_1')->default(0)->notNullable(); // 1円玉
            $table->timestamps(); // created_at, updated_at のタイムスタンプ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cashbooks');
    }
}



