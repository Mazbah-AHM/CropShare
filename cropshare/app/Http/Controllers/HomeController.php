<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $posts = Post::with('user')->get();
        $postIds = Post::where("user_id", Auth::id())->pluck('id')->toArray();
        $notifications = Notification::whereIn("post_id", $postIds)->get();
        $notificationCount = $notifications->count();

        return view('welcome', compact('category', 'posts', 'notifications', 'notificationCount'));
    }
}
