<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('category_id');
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->integer('hit')->default(0);
            $table->integer('status')->default(0)->comment('0:pasif 1:aktif');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
            /* bir de şu timestamp alanlarının boş kalması konusu var.
            Elemanın bu konuda da kafası karışık */

            /* maalesef aşağıdaki kod ile tobloları ilişkilendiremedim.
            halbuki codeigniter hocasının sisteminde çalışmıştı??
            Araştırılacak! */
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
