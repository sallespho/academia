<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AlunoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $id = $this->id ?? '';
        
        return [
            'nome'                   => 'required|min:3|max:255|',
            'email'                  => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'resposanvel_financeiro' => 'nullable|min:3|max:255|',
            'data_nascimento'        => 'required|min:10|max:10',
            'altura'                 => 'nullable',
            'celular'                => 'required|',
            'n_casa'                 => 'required|',
            'rua'                    => 'required|min:3|max:255',
            'bairro'                 => 'required|min:3|max:255',
            'obeservacao'            => 'nullable',
            'dia_pagamento'          => 'required|numeric|min:1|max:30',
            'observacao'             => 'max:255',
            'cpf'                    => 'required|cpf|unique:alunos,cpf,' . $id,
        ];
    }
}
