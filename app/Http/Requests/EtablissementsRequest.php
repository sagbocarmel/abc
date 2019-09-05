<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtablissementsRequest extends FormRequest
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
            'numeroAutorisation' => 'required',
            'nom' => 'required',
            'description' => '',
            'type' => 'required',
            'statut' => 'required',
            'adresse' => 'required',
            'bp' => '',
            'tel' => 'required',
            'email' => 'email',
            'dateCreation' => 'required|date',
            'logo' => 'image|mimes:jpeg,png,jpg|max:1024'
        ];
    }
}
