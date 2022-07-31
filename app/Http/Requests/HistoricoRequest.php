<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoricoRequest extends FormRequest
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
            'valor'             => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'n_parcelas_pagas'  => 'nullable|integer',
            'descricao'         => 'nullable|min:3|max:100'
        ];
    }
}
