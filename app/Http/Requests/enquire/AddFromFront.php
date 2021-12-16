<?php

namespace App\Http\Requests\enquire;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddFromFront extends FormRequest
{
    public function __construct()
    {
        $this->city=City::all()->pluck('id')->toArray();
        $this->state=State::all()->pluck('id')->toArray();
        $this->country=Country::all()->pluck('id')->toArray();
    }
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
            'email' => 'required|email|unique:enquiries,email',
            'first_name' => 'required|string|max:50|min:3',
            'last_name' => 'required|string|max:50|min:3',
            'phone' =>'required|min:10|max:10|unique:enquiries,phone',
            'education' => 'required',
            'passport_number' => 'required|unique:enquiries,passport_no',
            'dob' => 'required|date|before:-15 years',
            'country_id' => 'required|'.Rule::in($this->country),
            'city_id' => 'required|'.Rule::in($this->city),
            'state_id' => 'required|'.Rule::in($this->state),
            'postal_code' => 'required|max:6|min:6',
            'address' => 'required',
            'gender' => 'required|'.Rule::in(['male', 'female']),
        ];
    }
}
