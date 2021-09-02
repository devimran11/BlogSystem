<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->favorite_posts()->get();
        return view('layouts.backend.favorite', compact('posts'));
    }
}
