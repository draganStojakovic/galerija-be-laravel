<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_url', 'user_id'];

    protected $casts = ['image_url' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function search($term)
    {
        return self::with('user')->where('title', 'LIKE', '%' . $term . '%')->orderBy('created_at', 'desc')->paginate(10);
    }

    public static function searchUserGalleries($term, $userId)
    {
        return self::where('title', 'LIKE', '%' . $term . '%')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
}
