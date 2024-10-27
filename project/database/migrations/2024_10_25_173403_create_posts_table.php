<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id'); // Post ID as BIGINT
            $table->unsignedBigInteger('category_id'); // Foreign key as BIGINT
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Foreign key constraint
            
            $table->string('title');
            $table->text('content');
            $table->enum('status', ['draft', 'published'])->default('draft');
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
        Schema::dropIfExists('posts');
    }
}
