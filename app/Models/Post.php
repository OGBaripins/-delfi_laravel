<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    public $timestamps = false;
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'link',
        'title',
        'date',
        'fb_shares',
        'comment_count',
        'photo_name',
        'post_id',
        'author'
    ];
}
