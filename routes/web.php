<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $firstUser = \App\Models\User::first();
    $firstTag = \App\Models\Tag::first();

    $post = $firstUser->posts()->create([
        'title' => 'Post Title',
        'body' => 'Post Body'
    ]);

    $post->tags()->attach($firstTag);
});

Route::get('likables', function () {
    $firstUser = \App\Models\User::first();

    $firstPost = $firstUser->posts()->create([
        'title' => 'Post Title',
        'body' => 'Post Body'
    ]);

    $firstPost->like($firstUser);
});
