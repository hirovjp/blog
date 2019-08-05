<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('people_id')->unsigned();
           $table->integer('product_id')->unsigned();
           $table->text('body');
           $table->timestamps();
           $table->foreign('product_id')->references('id')->on('products');
           $table->foreign('people_id')->references('id')->on('people');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
