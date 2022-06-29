<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kikit_article', function (Blueprint $table) {
            $table->bigIncrements('article_id');
            $table->integer('user_id');
            $table->integer('article_img');
            $table->string('article_title','25');
            $table->string('article_description','300');
            $table->string('area');
            $table->string('category');
            $table->string('adress');
            $table->integer('featur_flg');
            $table->integer('like_flg');
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
        Schema::dropIfExists('kikit_article');
    }
};
