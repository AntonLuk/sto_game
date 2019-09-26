<?php

namespace App\Http\Controllers;

use App\Post;
use App\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function form($prize) {
        $prize = Prize::find($prize);
        return view('post.post_form', compact('prize'));
    }

    public function send(Request $request) {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->prize_id = $request->prize_id;
        $post->save();

        $user = \App\User::find(Auth::user()->id);
        $user->address = $request->address;
        $user->fio = $request->fio;
        $user->index = $request->index;
        $user->save();

        $prize = Prize::find($request->prize_id);
        $prize->active = false;
        $prize->save();
        return redirect(route('game'));
    }
}
