<?php

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Company;

if (! function_exists('get_company_by_id')) {
    function get_company_by_id($id) {
        return Company::find($id);
    }
}

if (! function_exists('get_city')) {
    function get_city() {
        return [];
    }
}

if (! function_exists('get_city_by_id')) {
    function get_city_by_id($city_id) {
        return City::find($city_id);
    }
}

if (! function_exists('get_state_by_id')) {
    function get_state_by_id($state_id) {
        return State::find($state_id);
    }
}

if (! function_exists('get_country_by_id')) {
    function get_country_by_id($country_id) {
        return Country::find($country_id);
    }
}

if (! function_exists('get_state')) {
    function get_state() {
        return [];
    }
}


if (! function_exists('get_country')) {
    function get_country($allowed="1") {
        if($allowed=='0')
        {
            return Country::all();
        }
        else
        {
            return Country::whereIn('id',['101','13'])->get();
        }
    }
}

if (! function_exists('getCurrentCompany')) {
    function getCurrentCompany() {
        $request = new Request();
        dd(URL::full());
        dd(Route::current()->getName());
    }
}

if (! function_exists('InputControl')) {
    function InputControl($type,$name,$placeholder,$default_value="0") {
        return "<h1>1231</h1>";
        //   `<div class="col-md-6">
        //     <div class="form-group">
        //         <label for="name">{$placeholder}</label>
        //         <input type={{ $type }}name" id="name" value="{{old('name')}}" class="form-control" required>
        //     </div>
        // </div>`;
    }

    
}
