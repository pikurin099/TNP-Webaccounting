<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cashbalancelogs', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->notNullable();
            $table->bigIncrements('user_id')->notNullable();
            $table->text('title')->notNullable();
            $table->date('date')->notNullable();
            $table->decimal('total_balance',10,2)->notNullable();
            $table->integer('cash_type_10000')->default(0)->notNullable();
            $table->integer('cash_type_5000')->default(0)->notNullable();
            $table->integer('cash_type_1000')->default(0)->notNullable();
            $table->integer('cash_type_500')->default(0)->notNullable();
            $table->integer('cash_type_100')->default(0)->notNullable();
            $table->integer('cash_type_50')->default(0)->notNullable();
            $table->integer('cash_type_10')->default(0)->notNullable();
            $table->integer('cash_type_5')->default(0)->notNullable();
            $table->integer('cash_type_1')->default(0)->notNullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashbalancelogs');
    }
};
