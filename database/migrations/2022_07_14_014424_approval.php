<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Approval extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_data', function (Blueprint $table) {
            $table->id();
            $table->string('refer');
            $table->string('type');
            $table->integer('level');
            $table->timestamp('time_log', $precision = 0)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approval_data');
    }
}
