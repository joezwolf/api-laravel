<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'sometimes|string|max:100',
            'precio' => 'sometimes|numeric|min:0|max:999999.99',
            'fecha_lanzamiento' => 'sometimes|date|before_or_equal:today',
            'disponible' => 'sometimes|boolean',
            'rating' => 'nullable|numeric|min:0|max:10',
            'genero' => 'sometimes|in:acción,aventura,deportes,rol,estrategia,otros',
            'plataformas' => 'nullable|json',
        ];
    }
}

