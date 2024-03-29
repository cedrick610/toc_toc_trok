<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $with = ['user' ];

    public function post()
    {
        return $this->belongsTo(Post::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'content',
        'image',
        'tags',
        'user_id',
        'post_id'
    ];
}

