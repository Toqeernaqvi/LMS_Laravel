<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Area;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Organization;
use App\Models\State;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
            // return view('pages.users.user', ['countries' => $model->paginate(15)]);
            try {
                 $country = Country::where('flag', '1')->get();
                $state = State::where('flag', '1')->get();
                $city = City::where('flag', '1')->get();
                $area = Area::where('flag', '1')->get();
                $account = Account::where('flag', '1')->get();
                $organization = Organization::where('flag', '1')->get();
                $branch = Branch::where('flag', '1')->get();
          return view('users.index', compact('country','state','city','area','account','organization','branch'));
            } catch (\Exception $e) {
                return $e->getMessage();
            }

     }
}
