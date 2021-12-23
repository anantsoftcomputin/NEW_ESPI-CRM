<?php

use App\Models\Activity;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\FollowUp;
use App\Models\ReferralCode;
use App\Models\User;
use PhpParser\Node\Stmt\Return_;

if (! function_exists('get_user')) {
    function get_user($id) {
        return User::where("id",$id)->first();
    }
}

if (! function_exists('get_Referral_By_Code')) {
    function get_Referral_By_Code($code) {
        return ReferralCode::where("reference_code",$code)->first();
    }
}

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

if (! function_exists('my_team_member')) {
    function my_team_member($role='counsellor') {

        return User::where('company_id',\Auth::user()->company_id)
        ->whereHas(
                'roles', function($q) use($role){
                    $q->where('name', $role);
                }
            )
        ->get();
        // whereHas(
        //     'roles', function($q){
        //         $q->where('name', 'Teacher');
        //     }
        // )
    }
}

if (! function_exists('today_follow_up')) {
    function today_follow_up($role='counsellor') {
        return FollowUp::whereDate('date', date('Y-m-d'))
        ->where('assist_by',\Auth::user()->id)
        ->get();
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
            return Country::whereIn('id',['101','13','230','82','75','38','212'])->get();
        }
    }
}

if (! function_exists('get_level')) {
    function get_level() {
       return $level[]=[
            'under-graduate'=>'Under Graduate',
            'diploma'=>'Diploma',
            'advance-diploma'=>'Advance Diploma',
            'bachelor'=>'Bachelor',
            'post-graduate-diploma'=>'Post Graduate Diploma',
            'master'=>'Master',
        ];

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

if (! function_exists('document_file')) {
    function document_file($path)
    {
        return public_path($path);
        $url = Storage::url($path);
        return $url;
        if (file_exists($p['path'])) {
            return "Exists";
            return '/images/photos/account/' . $this->account_id .'.png';
        } else {
            return "Not Exists".$path;
            return '/images/photos/account/default.png';
        }
    }
}

if (! function_exists('bootstrap_input_6')) {
    function bootstrap_input_6($name,$label,$value)
    {
        return '
        <div class="col-md-6">
            <div class="mb-3">
                <label for="labale'.$name.'" class="form-label">'.Str::ucfirst($label).'</label>
                <input type="email" class="form-control" id="labale'.$name.'" name="'.$name.'" placeholder="name@example.com" value="'.$value.'">
            </div>
        </div>';
    }
}

if(! function_exists('EnqActivity'))
{
function EnqActivity($mgs,$EnqId)
{
    return Activity::create(['string'=>$mgs,'enquiry_id' => $EnqId]);
}
}
