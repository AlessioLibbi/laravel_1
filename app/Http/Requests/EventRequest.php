<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "date" => ['required', 'date_format:Y-m-d'],
            "price" => ['required', 'min:1'],
            "city" => ['required', 'string', 'min:1'],
            "address" => ['required', 'string','min:1'],
            "description" => ['required', 'string', 'min:10'],
           
        ];
    }
    public function messages(): array
    {
        return [
           "name.required" => "IL Campo e richiesto",

           "date.required" => "IL Campo e richiesto",
           "date.date_format" => "IL Campo deve essere del giusto formato",
           

           "price.required" => "IL Campo e richiesto",
           "price.number" => "Inserire numero valido",
           "price.min" => "IL Campo deve essere minimo di 1 numero",

           "city.required" => "IL Campo e richiesto",
           "city.string" => "Inserire un valore valido",
           "city.uppercase" => "IL Campo deve iniziare con una Maiuscola",
           "city.min" => "IL Campo deve essere di almeno una lettera o numero",

           "address.required" => "IL Campo e richiesto",
           "address.string" => "Inserire un valore valido",
           "address.uppercase" => "IL Campo deve iniziare con una Maiuscola",
           "address.min" => "IL Campo deve essere di almeno una lettera o numero",

           "description.required" => "IL Campo e richiesto",
           "description.string" => "Inserire un valore valido",
           "description.min" => "IL Campo deve essere di almeno 10 LETTERE",



        ];
    }
}
