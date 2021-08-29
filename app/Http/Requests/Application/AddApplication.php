<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class AddApplication extends FormRequest
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
            'university_id' => 'required',
            'course_id' => 'required',
            'intact_month_id' => 'required',
            'enquiry_id' => 'required',
            'intact_year_id' => 'required'
        ];
    }
}
