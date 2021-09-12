<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoinPairs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('coinPairs', function (Blueprint $table) {
            $table->string('username');
            $table->string('coin1');
            $table->string('coin2');
            $table->date('created_at');
            $table->date('updated_at');
            $table->timestamps();
        });
    }
}
