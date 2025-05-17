<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function show(Image $image)
    {
        // Cargamos user, comentarios con sus users y reputación ya disponible
        $image->load(['user', 'comments.user', 'likes.user']);
        return view('images.show', compact('image'));
    }
}
