<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function likePost(Request $request)
    {
        // Get the post data from the request
        $posts = $request->input('postId');

        $current_user = Auth::user();

        // Check if the post data is an array
        if (is_array($posts)) {
            foreach ($posts as $post_id => $postData) {
                // Assuming $postData is an associative array representing a pos

                // Retrieve the post based on the ID
                if ($post_id == "id") {
                    $postId = $postData;
                    $post = Post::find($postId);

                    // Check if the post exists
                    if ($post) {
                        // Create a new notification
                        $notification = new Notification();
                        $notification->post_id = $postId;
                        $notification->message = "$current_user->name has liked your post";
                        $notification->user_id = $current_user->id;
                        $notification->save();
                    }
                }
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid post data']);
    }
}
