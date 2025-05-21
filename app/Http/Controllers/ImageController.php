<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Requests\DeleteImageRequest;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ImageController extends Controller
{
    use AuthorizesRequests;
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
        $this->authorize('update', $image);
        return view('images.edit', compact('image'));
    }

    // Actualizar usando UpdateImageRequest
    public function update(UpdateImageRequest $request, Image $image)
    {

        $image->update([
            'description' => $request->input('description'),
        ]);

        return redirect()->route('images.show', $image)
            ->with('success', 'Descripción actualizada.');
    }

    // Borrar usando DeleteImageRequest
    public function destroy(DeleteImageRequest $request, Image $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('home')
            ->with('success', 'Imagen eliminada.');
    }

    // Mostrar el formulario
    public function create()
    {
        return view('images.create');
    }

    // Procesar la subida usando StoreImageRequest
    public function store(StoreImageRequest $request)
    {
        // $request ya validó y autorizó
        $path = $request->file('image_file')->store('images', 'public');

        Image::create([
            'user_id'     => Auth::id(),
            'image_path'  => $path,
            'description' => $request->input('description', ''),
        ]);

        return redirect()->route('home')
            ->with('success', 'Imagen subida correctamente.');
    }

    public function ranking()
    {
        $images = Image::with('user')
            // Con withSum sumamos el campo 'reputation' de la relación likers
            ->withSum('likers as likes_reputation', 'reputation')
            ->orderByDesc('likes_reputation')
            ->paginate(12);

        return view('images.ranking', compact('images'));
    }
}
