<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_url'];

    protected $casts = ['image_url' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function createComment($content)
    // {
    //     $this->comments()->create([
    //         'content' => $content, 
    //         'user_id' => auth()->id(), 
    //     ]);
    // }

}
