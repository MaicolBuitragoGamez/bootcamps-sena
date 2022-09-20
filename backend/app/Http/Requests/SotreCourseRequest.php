<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|min:10|max:30",
            "description" => "required|min:10",
            "weeks" => "required|numeric",
            "average_cost" => "required|numeric",
            "minimum_skill" => "exists:users,id"
        ];
    }
    /*
    *enviar respuesta en caso de validacion fallida
    */
    protected function failedValidation(Validator $v){
        //lanzar una excepción HttpResponse en caso de errores de validacion
        throw  new HttpResponseException( response()->json( [
                                                              "success" => false,
                                                              "errors" => $v->errors()
                                                            ], 422 ) );
    }
}
