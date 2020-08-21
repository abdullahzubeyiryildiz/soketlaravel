<?php

use Illuminate\Support\Facades\Broadcast;
use App\Auth;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


/* Broadcast::channel('post.{id}', function ($user, $id) {
    return (int) $user->id == (int) \App\Post::find($id)->user_id;
  
    //  return true;
}); */

Broadcast::channel('post.{id}', function ($user, $id) {
    return $user->id === Order::findOrNew($id)->id;
});
