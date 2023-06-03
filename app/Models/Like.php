<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tweet_id',
        'liked',
    ];

    // ...

    // Kiểm tra xem người dùng đã thích bài viết này chưa
    public static function userLikedTweet($userId, $tweetId)
    {
        return self::where('user_id', $userId)
            ->where('tweet_id', $tweetId)
            ->exists();
    }
}
