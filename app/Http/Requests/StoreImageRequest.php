<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Image;

class StoreImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image_file'  => ['required','image','max:2048'],
            'description' => ['nullable','string','max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'image_file.required' => 'Debes seleccionar una imagen.',
            'image_file.image'    => 'El archivo debe ser una imagen.',
            'image_file.max'      => 'Máximo 2MB.',
        ];
    }
}
