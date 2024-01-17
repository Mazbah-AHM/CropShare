<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function createPost(Request $request)
    {
        $post = new Post();
        $user = auth()->user();
        // dd($request);

        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('postimage', $imagename);
        $post->image = $imagename;
        $post->user_id = $user->id;

        $post->save();

        return back()->with('success', 'Register Succesful!');
    }
}
