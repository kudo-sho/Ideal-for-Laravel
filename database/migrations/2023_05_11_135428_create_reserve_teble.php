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
        Schema::create('reserve', function (Blueprint $table) {
            $table->id('rsv_id')->primary();
            $table->integer('cst_id');
            $table->dateTime('rsv_date');
            $table->timestamp('app_date');
            $table->tinyInteger('person');
            $table->tinyInteger('table_id')->nullable();
            $table->integer('c_id')->nullable();
            $table->tinyInteger('del_flg')->nullable();
            $table->dateTime('del_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_teble');
    }
};
