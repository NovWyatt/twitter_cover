<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request, User $user)
    {
        $follower = auth()->user(); // Lấy người dùng đã xác thực
        if ($follower->id == $user->id) {
            return back()->with('message', 'You cannot follow yourself');
        }

        $isFollowing = Follower::where('follower_id', $follower->id)
            ->where('following_id', $user->id)
            ->exists();

        if ($isFollowing) {
            Follower::where('follower_id', $follower->id)
                ->where('following_id', $user->id)
                ->delete(); // Hủy theo dõi người dùng
            return back()->with('message', 'You have unfollowed ' . $user->username);
        } else {
            Follower::create([
                'follower_id' => $follower->id,
                'following_id' => $user->id,
            ]); // Theo dõi người dùng
            return back()->with('message', 'You are now following ' . $user->username);
        }
    }
}
