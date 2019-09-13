<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppreciationRequest extends FormRequest
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
            'codeEtablissement' => 'required',
            'codeAnnee' => 'required',
            'matriculeEleve' => 'required',
            'niveau' => 'required',
            'codeClasse' => 'required',
            'codeMatiere' => 'required',
            'codeEvaluation' => 'required',
            'periode' => 'required',
            'appreciation' => 'required',
            'dateAppreciation' => 'required'
        ];
    }
}
