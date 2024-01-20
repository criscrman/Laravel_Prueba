<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           
                'Nombre' => 'required|min:3',
                'Ubicacion' => 'required|max:40',
                'Descripcion' => 'required|min:10|max:400' 
    
            
        ];
    }

    public function messages(): array  
    {
        return [    
            'Descripcion.required'=> 'Debes hacer una descripción, no puedes dejar este campo vacio.',
        ];

    }
}
