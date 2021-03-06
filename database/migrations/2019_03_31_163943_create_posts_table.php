<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
  
    public function up()
    {
        Schema::create('posts',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('img',255);
            $table->integer('like')->default(0);
            $table->timestamps();
        });
    }

 
    public function down()
    {
        //
    }
}
