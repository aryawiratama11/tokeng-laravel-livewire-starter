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
            $table->string('noref');
            $table->timestamp('date');
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->integer('qty');
            $table->string('uom')->nullable();
            $table->string('rack')->nullable();
            $table->string('location_used')->nullable();
            $table->string('cost_center')->nullable();
            $table->boolean('purpose_1')->default(0);
            $table->boolean('purpose_2')->default(0);
            $table->boolean('purpose_3')->default(0);
            $table->boolean('remark')->default(0);
            $table->string('user');
            $table->boolean('approved_1')->default(0);
            $table->boolean('approved_2')->default(0);
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
