<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Image $image)
    {
        // Validamos
        $data = $request->validate([
            'content' => ['required', 'string', 'max:500'],
        ]);

        // Creamos el comentario
        Comment::create([
            'user_id'  => Auth::id(),
            'image_id' => $image->id,
            'content'  => $data['content'],
        ]);

        // Redirigimos de vuelta al detalle, con mensaje opcional
        return redirect()
            ->route('images.show', $image)
            ->with('success', 'Comentario añadido correctamente.');
    }

    public function destroy(Comment $comment)
    {
        // Verificar que el usuario autenticado es el autor
        if (Auth::id() !== $comment->user_id) {
            abort(403);
        }

        // Borrar el comentario
        $comment->delete();

        // Redirigir de vuelta a la imagen con mensaje
        return back()->with('success', 'Comentario eliminado correctamente.');
    }
}
