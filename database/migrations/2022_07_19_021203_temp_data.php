<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TempData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_data', function (Blueprint $table) {
            $table->id();
            $table->string('refer');
            $table->integer('value')->default(0);
            $table->string('type');
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
        Schema::dropIfExists('temp_data');
    }
}
