<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Paginamos imágenes con relaciones necesarias
        $images = Image::with(['user', 'comments.user', 'likes.user'])
                       ->orderBy('created_at', 'asc')
                       ->paginate(12);

        return view('home', compact('images'));
    }
}
