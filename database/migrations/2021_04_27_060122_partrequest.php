<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Partrequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partrequest', function (Blueprint $table) {
            $table->id();
            $table->string('noreq');
            $table->timestamp('date');
            $table->string('item_code');
            $table->string('item_name');
            $table->integer('qty');
            $table->string('uom');
            $table->string('rack')->nullable();
            $table->string('location used')->nullable();
            $table->string('cost center')->nullable();
            $table->string('purpose')->nullable();
            $table->string('remark')->nullable();
            $table->string('user');
            $table->string('approved_1')->nullable();
            $table->string('approved_2')->nullable();
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
