<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAdd extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required', 
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Trường này không được để trống !',
            'title.unique' => 'Trường này phải là duy nhất !',
            'description.required'  => 'Trường này không được để trống !',
            'content.required' => 'Trường này không được để trống !',
        ];
    }
}
