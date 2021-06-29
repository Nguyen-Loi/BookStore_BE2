<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('idBook');
            $table->string('image')->nullable();
            $table->unsignedInteger('idCategory');
            $table->string('nameBook');
            $table->unsignedInteger('idAuthor');
            $table->float('rate');
            $table->integer('price')->nullable();
            $table->integer('salePrice')->nullable();
            $table->integer('SoldBooks')->nullable();
            $table->text('Description')->nullable();
            $table->integer('Quantity');
            $table->integer('Feature')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();

        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
