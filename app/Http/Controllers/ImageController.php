<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function show(Image $image)
    {
        // Cargamos relaciones
        $image->load(['user', 'comments.user', 'likes.user']);

        // IDs ordenados de todas las imágenes
        $allIds = Image::orderBy('created_at', 'desc')->pluck('id')->toArray();
        $currentIndex = array_search($image->id, $allIds);

        $prevId = $allIds[$currentIndex - 1] ?? null; // más viejo
        $nextId = $allIds[$currentIndex + 1] ?? null; // más reciente

        return view('images.show', compact('image', 'prevId', 'nextId'));
    }
}
