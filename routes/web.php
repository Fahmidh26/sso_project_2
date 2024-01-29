<?php

use App\Http\Controllers\Auth\CallbackController as AuthCallbackController;
use App\Http\Controllers\CallBacksController;
use Auth0\Laravel\Facade\Auth0;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
  $user = auth()->user();
  $name = $user->name ?? 'User';
  $email = $user->email ?? '';

  return view('layouts.index',compact('name','email'));
})->middleware('auth');

Route::get('/scope', function () {
    return response('You have `read:messages` permission, and can therefore access this resource.');
})->middleware('auth')->can('read:messages');

Route::get('/logout', function () {
  // Log the user out of Laravel
  Auth::logout();

  // Redirect the user to the Auth0 logout URL
  return redirect('/');
})->name('auth0.logout');

// Route::get('/callback', function () {
//   $user = auth()->user();
//   $name = $user->name ?? 'User';
//   $email = $user->email ?? '';

//   return view('layouts.index',compact('name','email'));
// })->name('auth0.callback');

Route::get('/a', function () {
  if (auth()->check()) {
    $user = auth()->user();
    $name = $user->name ?? 'User';
    $email = $user->email ?? '';
  
    return response("Hello {$name}! Your email address is {$email}.");
  } else {
    // User is not logged in, display a message and a Sign Up button.
    return view('welcome')->with(['message' => 'You are not logged in. Sign up to get started.']);
}

});

Route::get('/colors', function () {
  $endpoint = Auth0::management()->users();

  $colors = ['red', 'blue', 'green', 'black', 'white', 'yellow', 'purple', 'orange', 'pink', 'brown'];

  $endpoint->update(
    id: auth()->id(),
    body: [
        'user_metadata' => [
            'color' => $colors[random_int(0, count($colors) - 1)]
        ]
    ]
  );

  $metadata = $endpoint->get(auth()->id()); // Retrieve the user's metadata.
  $metadata = Auth0::json($metadata); // Convert the JSON to a PHP array.

  $color = $metadata['user_metadata']['color'] ?? 'unknown';
  $name = auth()->user()->name;

  return response("Hello {$name}! Your favorite color is {$color}.");
})->middleware('auth');
