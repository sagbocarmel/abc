<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassesRequest extends FormRequest
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
            //
            'codeEtablissement'=> 'required',
            'niveau' => 'required',
            'codeClasse' => 'required',
            'anneEtude' => 'required',
            'serie' => 'required',
            'codeSection' => 'required'
        ];
    }
}
