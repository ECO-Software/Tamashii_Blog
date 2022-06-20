<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // You can only update a post if you are the author of the post.
    public function author(User $user, Post $post){
        return $user->id == $post->user_id;
    }

    // You can only see the post if its status is published regardless of whether the user is logged in.
    public function published(?User $user, Post $post){
        return $post->status == 1;
    }

}
