<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Toggle like for the authenticated user.
     */
    public function toggle(Image $image)
    {
        $user = Auth::user();

        // Si el usuario da like a su propia imagen, no hacemos nada extra
        $isSelf = $image->user_id === $user->id;

        // Comprueba si ya tiene like
        $existing = $image->likes()->where('user_id', $user->id)->first();

        if ($existing) {
            // Si existe, lo borramos (toggle off)
            $existing->delete();

            // Si no es self-like, restamos reputación al autor
            if (! $isSelf) {
                $image->user()->decrement('reputation', 1);
            }
        } else {
            // Si no existe, lo creamos (toggle on)
            $image->likes()->create(['user_id' => $user->id]);

            // Si no es self-like, incrementamos reputación al autor
            if (! $isSelf) {
                $image->user()->increment('reputation', 1);
            }
        }

        return back();
    }
}
