<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_category_id')->default(0)->nullable();
            $table->foreign('article_category_id')->references('id')->on('article_category');
            $table->string('author')->nullable();
            $table->string('avatar')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->integer('view_count')->default(0)->nullable();
            $table->string('slug')->unique();
            $table->boolean('popular')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('sort_id')->default(0);
            $table->string('seo_title')->nullable(); 
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('article');
    }
}
