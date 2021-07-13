<?php

namespace App\Http\Controllers\Auth;
use App\Models\Account;
use App\Models\Area;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Organization;
use App\Models\State;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
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
              return view('auth.register', compact('country','state','city','area','account','organization','branch'));
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
    
         
       
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name ,
            'last_name' =>  $request->last_name,
            'father_name' => $request->father_name ,
            'cnic' => $request->cnic ,
            'dob' => $request->dob ,
            'phone' => $request->phone ,
            'address' => $request->address ,
            'account_id' => $request->account_id ,
            'organization_id' => $request->organization_id ,
            'branch_id' => $request->branch_id ,
            'country_id' => $request->country_id ,
            'state_id' => $request->state_id ,
            'city_id' => $request->city_id ,
            'area_id' => $request->area_id ,
            'status' =>  "Active",
            'flag' =>  "1",
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
