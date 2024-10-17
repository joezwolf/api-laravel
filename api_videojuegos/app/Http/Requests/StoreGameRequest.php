<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0|max:999999.99',
            'fecha_lanzamiento' => 'required|date|before_or_equal:today',
            'disponible' => 'boolean',
            'rating' => 'nullable|numeric|min:0|max:10',
            'genero' => 'required|in:acción,aventura,deportes,rol,estrategia,otros',
            'plataformas' => 'nullable|json',
        ];
    }
}

