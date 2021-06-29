<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoryCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HistoryCart', function (Blueprint $table) {
            $table->integer('qty');
            $table->integer('Total');
            $table->foreignID('idUser');
            $table->foreignID('idBook');
            // $table->timestamp('last_used_at')->nullable(); 
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HistoryCart');
    }
}
