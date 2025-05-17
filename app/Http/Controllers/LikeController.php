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

        // Comprueba si ya tiene like
        $existing = $image->likes()->where('user_id', $user->id)->first();

        if ($existing) {
            // Si existe, lo borramos (toggle off)
            $existing->delete();
        } else {
            // Si no existe, lo creamos (toggle on)
            $image->likes()->create(['user_id' => $user->id]);
        }

        return back();
    }
}
