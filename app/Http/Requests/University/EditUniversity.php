<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class EditUniversity extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'country_id' => 'required',
            'phone' => 'required',
            'web'=>'required',
            'status'=>'required',
        ];
    }
}
