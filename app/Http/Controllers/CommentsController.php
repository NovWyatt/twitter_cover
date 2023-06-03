<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request) {
   
       auth()->user()->comments()->create([
            'tweet_id' => $request->tweet_id,
            'comment' => $request->comment,
            
        ]);
        
        return redirect()->back()->with('message', 'Reply sent');
        

    }

    // public function update(Request $request, $id) {
    //     $comment = Comment::findOrFail($id);
    //     $comment->comment = $request->input('comment');
    //     $comment->save();
    
    //     return redirect()->back()->with('message', 'Comment updated');
    // }
    // public function delete($id) {
    //     $comment = Comment::findOrFail($id);
    //     $comment->delete();
    
    //     return redirect()->back()->with('message', 'Comment deleted');
    // }
}
