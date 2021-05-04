<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Partin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partin', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('item_code');
            $table->string('item_name')->nullable();
            $table->integer('qty');
            $table->string('remark');
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
