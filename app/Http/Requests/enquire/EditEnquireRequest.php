<?php

namespace App\Http\Requests\enquire;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\User;

class EditEnquireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function __construct()
    {
        $this->city=City::all()->pluck('id')->toArray();
        $this->state=State::all()->pluck('id')->toArray();
        $this->country=Country::all()->pluck('id')->toArray();
    }

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
            'email' => 'required|email',
            'first_name' => 'required|string|max:50|min:3',
            'last_name' => 'required|string|max:50|min:3',
            'phone' =>'required|min:10|max:10',
            'education' => 'required',
            // 'passport_number' => 'required|regex:/[a-zA-Z]{2}[0-9]{7}/|unique:enquiries,passport_number',
            'dob' => 'required|date|before:-15 years',
            'country_id' => 'required|'.Rule::in($this->country),
            'city_id' => 'required|'.Rule::in($this->city),
            'state_id' => 'required|'.Rule::in($this->state),
            'postal_code' => 'required|max:6|min:6',
            'address' => 'required',
            'gender' => 'required|'.Rule::in(['male', 'female']),
            'counsellor_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'dob.before' => 'your age is not eligible to fill this form.',
        ];
    }

    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|lowercase',
            'address' => 'trim'
        ];
    }
}
