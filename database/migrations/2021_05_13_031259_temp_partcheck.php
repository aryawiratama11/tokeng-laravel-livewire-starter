<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TempPartcheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_register', function (Blueprint $table) {
            $table->string('item_code')->primary();
            $table->string('item_name')->nullable();
            $table->decimal('qty', $precision = 5, $scale = 2)->nullable();
            $table->integer('minimum')->nullable();
            $table->string('uom')->nullable();
            $table->string('location')->nullable();
            $table->boolean('status')->default(1);
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
