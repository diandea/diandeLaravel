<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitFormRequest extends FormRequest
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
            'designation' => 'required|min:5|max:255',
            'prix' => 'required|digits_between:2,5',
            'description' => 'required|min:10',
            'poids' => 'required|digits_between:1,2',
            'like' => 'required|digits_between:1,2',
            'pays_source' => 'required|min:3|max:255',
        ];
    }
}
