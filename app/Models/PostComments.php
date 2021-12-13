<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComments extends Model
{
    use HasFactory;

    protected $table = 'post_comment';
    public $timestamps = false;
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'post_id',
        'comment_id',
        'author',
        'date',
        'comment_subject',
        'comment_body',
        'upvote_count',
        'downvote_count',
        'parent_id',
        'reply_count'
    ];
}
