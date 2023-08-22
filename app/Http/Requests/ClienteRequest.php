<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
     {
        return [
            'nome' => 'required|max:80|min:5',
            'celular'=> 'required|max:15|min:10',
            'email'=> 'required|email|unique:clientes,email',
            'password'=>'required'
        ];
    } 
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success'=> false,
            'error'=>$validator->errors()
        ]));
    }
    public function messages(){
        return [
            'nome.required'=>'O campo nome é obrigatório',
            'nome.max'=>'O campo nome deve conter no máximo 80 caracteres',
            'nome.max'=>'O campo nome deve conter no mínimo 5 caracteres',
            'celular.required'=>'Celular obrigátorio',
            'celular.max'=>'Celular deve conter no máximo 15 caracteres',
            'celular.min'=>'Celular deve conter no mínimo 10 caracteres',
            'email.required'=>'E-mail obrigátorio',
            'email.email'=>'Formato de e-mail inválido',
            'email.unique'=>'E-mail já cadastrado no sistema',
            'password.required'=>'Senha obrigátoria'
        ];
    }

}