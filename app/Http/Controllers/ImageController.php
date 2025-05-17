<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show(Image $image)
    {
        // Cargamos relaciones de usuario y likes (pero no comentarios completos)
        $image->load(['user', 'likes.user']);

        // IDs ordenados de todas las imágenes para flechas
        $allIds = Image::orderBy('created_at', 'asc')->pluck('id')->toArray();
        $currentIndex = array_search($image->id, $allIds, true);

        $prevId = $allIds[$currentIndex + 1] ?? null; // más antigua
        $nextId = $allIds[$currentIndex - 1] ?? null; // más reciente

        // Paginamos comentarios: 10 por página
        $comments = $image->comments()->with('user')->orderBy('created_at', 'asc')->paginate(10);

        return view('images.show', compact('image', 'prevId', 'nextId', 'comments'));
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $data = $request->validate([
            'description' => ['required', 'string', 'max:500'],
        ]);

        $image->update($data);

        return redirect()
            ->route('images.show', $image)
            ->with('success', 'Descripción actualizada.');
    }

    public function destroy(Image $image)
    {
        // Borra fichero físico si lo tienes en storage...
        Storage::disk('public')->delete($image->image_path);

        $image->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Imagen eliminada.');
    }
}
