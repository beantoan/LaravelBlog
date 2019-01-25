<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Comment extends Model
{
    use CounterCache;

    protected $fillable = ['content', 'user_id', 'post_id'];

    public $counterCacheOptions = [
        'Post' => [
            'field' => 'comments_count',
            'foreignKey' => 'post_id',
            'filter' => 'commentValidatedFilter'
        ]
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function commentValidatedFilter() {
        if ($this->validated) {
            return true;
        }

        return false;
    }
}
