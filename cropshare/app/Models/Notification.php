<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function getNotifications()
    {
        $postIds = Post::where("user_id", Auth::id())->pluck('id')->toArray();
        dd($postIds);

        return Notification::whereIn("post_id", $postIds)->get();
    }
}
