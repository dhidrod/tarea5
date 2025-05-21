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

        // Usamos la Policy que ya definimos:
        // return $this->user()->can('update', $image);
        
        // O directamente:
        return $this->user()->can('update', $image);
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
