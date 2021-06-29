<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Author extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Author', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('publishedBooks');
            $table->string('nameAuthor');
            $table->string('Description')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook');
            $table->string('twitter');  
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
        Schema::dropIfExists('Author');
    }
}
