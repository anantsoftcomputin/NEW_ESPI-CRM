<?php

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;


if (! function_exists('get_city')) {
    function get_city() {
        return City::where('state_id',1)->get();
    }
}


if (! function_exists('get_state')) {
    function get_state() {
        return State::where('country_id',1)->get();
    }
}


if (! function_exists('get_country')) {
    function get_country() {
        return Country::whereIn('id',[1])->get();
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
