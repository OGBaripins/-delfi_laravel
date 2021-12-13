<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment', function (Blueprint $table) {
            $table->foreign('post_id')->references('post_id')->on('post')->nullable(false);
            $table->decimal('comment_id')->nullable(false);
            $table->string('author')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('comment_subject')->nullable();
            $table->string('comment_doby')->nullable();
            $table->decimal('upvote_count')->nullable();
            $table->decimal('downvote_count')->nullable();
            $table->decimal('parent_id')->nullable();
            $table->decimal('reply_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comment');
    }
}
