<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Store or delete a like for a tweet.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $tweetId = $request->input('tweet_id');

        // Kiểm tra xem người dùng đã thích bài viết này chưa
        $like = Like::where('user_id', $userId)
            ->where('tweet_id', $tweetId)
            ->first();

        if ($like) {
            // Nếu đã thích, xóa bỏ sự thích
            $like->delete();
        } else {
            // Ngược lại, tạo mới sự thích
            Like::create([
                'user_id' => $userId,
                'tweet_id' => $tweetId,
                'liked' => true,
            ]);
        }

        // Trả về view hoặc JSON response tùy theo nhu cầu của bạn
        return redirect()->back();
    }
}
