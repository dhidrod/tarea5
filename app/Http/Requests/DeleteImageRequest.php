<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Traits\HasRoles;


class DeleteImageRequest extends FormRequest
{
    
    use HasRoles;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $image = $this->route('image');
        // Permitir solo si el usuario es el dueño:
        return $this->user()->id === $image->user_id || $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // no necesitamos reglas de campos, pero Laravel exige un array
        return [
            //
        ];
    }
}
