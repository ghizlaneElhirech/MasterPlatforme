<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->id,
            'password' => 'required|string|min:6|max:10',
            'gender_id' => 'required',
            'nationalitie_id' => 'required',
            
            'Date_Birth' => 'required|date|date_format:Y-m-d',
            'semestre_id' => 'required',
           
            
            'academic_year' => 'required',
        ];
    }
}