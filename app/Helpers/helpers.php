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
