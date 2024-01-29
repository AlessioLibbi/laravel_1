<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required'],
            "price" => ['required', 'integer', 'min:1'],
            "materials" => ['required',  'min:1'],
            "weight" => ['required', 'min:1', 'integer'],
            "description" => ['required', 'string', 'min:5'],
           
        ];
    }
    public function messages(): array
    {
        return [
           "name.required" => "IL Campo e richiesto",


           "price.required" => "IL Campo e richiesto",
           "price.min" => "IL Campo deve essere minimo di 1 numero",

           "materials.required" => "IL Campo e richiesto",
           "materials.min" => "IL Campo deve essere di almeno una lettera o numero",

           "weight.required" => "IL Campo e richiesto",
           "weight.min" => "IL Campo deve essere di almeno una lettera o numero",
            "weight.integer" => "Il campo deve essere un numero",



           "description.required" => "IL Campo e richiesto",
           "description.string" => "Inserire un valore valido",
           "description.min" => "IL Campo deve essere di almeno 10 LETTERE",



        ];
    }
}
