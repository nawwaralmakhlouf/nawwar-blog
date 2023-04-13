<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use Taggable;

    protected $fillable = ['title', 'tags', 'description', 'added_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')
            ->select('comments.*')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->where(function ($q) {
                return $q->where(function ($q) {
                    $q->where('comments.status', 'approved');
                })->orWhere(function ($q) {
                    $q->where('comments.status', 'pending')->where('posts.added_by', Auth::check() ? Auth::id() : -1);
                })->orWhere(function ($q) {
                    $q->where('comments.status', 'pending')->where('comments.added_by', Auth::check() ? Auth::id() : -1);
                });
            });
    }
}
