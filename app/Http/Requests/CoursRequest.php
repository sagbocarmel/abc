<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursRequest extends FormRequest
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
            'niveau' => 'required',
            'codeAnnee' => 'required',
            'codeClasse' => 'required',
            'codeMatiere' => 'required',
            'jourCours' => 'required',
            'heureDebut' => 'required',
            'heureFin' => 'required'
        ];
    }
}
