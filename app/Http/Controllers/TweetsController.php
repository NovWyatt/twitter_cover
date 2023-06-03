<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
    public function index()
    {
        $forYou = Tweet::latest()->filter(request(['search']))->get();
        $users = Auth::user()->following()->pluck('following_id');
        $tweets = Tweet::whereIn('user_id', $users)->latest()->filter(request(['search']))->get();

        return view('home', [
            'forYou' => $forYou,
            'followedUserTweets' => $tweets
        ]);
    }

    public function show($id)
    {
        $tweet = Tweet::with('comments')->find($id);
        return view('tweet', [
            'tweet' => $tweet,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tweets' => 'required',
            'image' => ['image'],
        ]);

        $tweet = Auth::user()->tweets()->create([
            'tweets' => $data['tweets'],
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        $tweet->image = $imagePath;
        $tweet->save();


        return back()->with('success', 'Tweet created successfully!');
        $tweet = Auth::user()->tweets()->create([
            'tweets' => $data['tweets'],
        ]);
        
        // Tìm các hashtag trong nội dung tweet
        $hashtags = [];
        preg_match_all('/#(\w+)/', $data['tweets'], $matches);
        
        if (!empty($matches[1])) {
            $hashtags = $matches[1];
        }
        
        // Lưu danh sách hashtag vào cơ sở dữ liệu
        foreach ($hashtags as $tag) {
            $tweet->hashtags()->create(['tag' => $tag]);
        }
        
    }

    
    // public function pinPost($id)
    // {
    //     $tweet = Tweet::find($id);
    //     $tweet->pinned = true;
    //     $tweet->save();

    //     // Redirect hoặc trả về response tùy thuộc vào yêu cầu của bạn
    // }

    // public function deletePost($id)
    // {
    //     $tweet = Tweet::find($id);
    //     $tweet->delete();

    //     // Redirect hoặc trả về response tùy thuộc vào yêu cầu của bạn
    // }

    // public function editPost(Request $request, $id)
    // {
    //     $tweet = Tweet::find($id);
    //     $tweet->tweets = $request->input('tweets');
    //     // Cập nhật các trường khác tương tự
    //     $tweet->save();

    //     // Redirect hoặc trả về response tùy thuộc vào yêu cầu của bạn
    // }
}
