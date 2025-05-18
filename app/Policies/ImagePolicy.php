<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;

class ImagePolicy
{
    /**
     * Determina si el usuario puede actualizar la imagen.
     */
    public function update(User $user, Image $image): bool
    {
        // Solo el autor
        return $user->id === $image->user_id;
    }

    /**
     * Determina si el usuario puede borrar la imagen.
     */
    public function delete(User $user, Image $image): bool
    {
        // Solo el autor
        return $user->id === $image->user_id;
    }

    /**
     * Determina si el usuario puede crear (subir) una nueva imagen.
     */
    public function create(User $user): bool
    {
        // Cualquier usuario autenticado puede subir imágenes.
        // Si queremos limitarlo (por ejemplo a solo admins), lo añadimos aquí.
        return true;
    }
}
