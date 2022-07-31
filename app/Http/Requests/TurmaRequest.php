<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
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
        return [
            'nome'          => 'unique:turmas|required|string|max:255|min:3',
            'modalidade'    => 'required|string|max:255|min:3',
            'dias_aula'     => 'nullable',
            'horario'       => 'required|max:13',
            'valor'         => 'nullable|numeric',
            'user_id'       => 'required|'
        ];
    }

    public function messages()
    {
        return
        [
            'nome.required'      => 'O campo nome é obrigatório',
            'user_id.required'   => 'É necessario escolher um professor para turma',
            'min'                => 'Deve conter ao menos três letras',
            'max'                => 'Limite de caracters excedido',
            'horario.numeric'    => 'Campo horario aceita apenas números',
            'valor.numeric'      => 'campo valor aceita apenas núeros',
            'horario.required'   => 'Campo horario é obrigatório',
            'modalidade.required' => 'O campo modalidade é obrigatório'
        ];
        
    }
}
