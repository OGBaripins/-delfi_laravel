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
        Schema::create('post', function (Blueprint $table) {
            $table->string('link')->nullable(false);
            $table->string('title')->nullable();
            $table->timestamp('date')->nullable(false);
            $table->integer('fb_shares')->nullable();
            $table->integer('comment_count')->nullable();
            $table->string('photo_name')->nullable();
            $table->decimal('post_id')->unique()->nullable(false);
            $table->string('author')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
