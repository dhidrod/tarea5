<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
     /**
     * Lógica de autorización: ¿puede este usuario actualizar esta imagen?
     */
    public function authorize(): bool
    {
        $image = $this->route('image'); // recupera el Image inyectado en la ruta

        return $this->user()->id === $image->user_id || $this->user()->hasRole('admin');
    }

     /**
     * Reglas de validación para la petición.
     */
    public function rules(): array
    {
        return [
            'description' => ['required','string','max:500'],
        ];
    }
}
