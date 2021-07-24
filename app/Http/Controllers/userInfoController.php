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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class userInfoController extends Controller
{
    public function index(User $model)
    {
        // return view('pages.users.user', ['countries' => $model->paginate(15)]);
        try {
            $userInfo = User::where('flag', '1')->get();
            $country = Country::where('flag', '1')->get();
            $state = State::where('flag', '1')->get();
            $city = City::where('flag', '1')->get();
            $area = Area::where('flag', '1')->get();
            $account = Account::where('flag', '1')->get();
            $organization = Organization::where('flag', '1')->get();
            $branch = Branch::where('flag', '1')->get();
            return view('pages.users.userInfoDisplay', compact('userInfo', 'country', 'state', 'city', 'area', 'account', 'organization', 'branch'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(User $model)
    {
        $userInfo = User::where('flag', '1')->get();
        $country = Country::where('flag', '1')->get();
        $state = State::where('flag', '1')->get();
        $city = City::where('flag', '1')->get();
        $area = Area::where('flag', '1')->get();
        $account = Account::where('flag', '1')->get();
        $organization = Organization::where('flag', '1')->get();
        $branch = Branch::where('flag', '1')->get();

        return view('pages.users.userInfo', ['userInfo' => $model->paginate(15)], compact('userInfo', 'country', 'state', 'city', 'area', 'account', 'organization', 'branch'));
    }
    //
    public function getAllCountries()
    {
        // logic to get all students
        $users = User::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function store(Request $request)
    {
        //logic to create a user 
        try {
            $user = $request->all();

            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->first_name . " " . $request->last_name;
            $user->father_name = $request->father_name;
            $user->cnic = $request->cnic;
            $user->dob = $request->dob;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->account_id = $request->account_id;
            $user->organization_id = $request->organization_id;
            $user->branch_id = $request->branch_id;
            $user->country_id = $request->country_id;
            $user->state_id = $request->state_id;
            $user->city_id = $request->city_id;
            $user->area_id = $request->area_id;

            $user->status = 'Active';
            $user->flag =  '1';
            $user->save();
            return redirect()->route('userInfo.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        //  logic to get a user here 
        if (User::where('id', $id)->where('flag', '1')->exists()) {
            $userInfo = User::where('id', $id)->get();
            return response($userInfo, 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }
    public function profileEdit()
    {
        $id = Auth::user()->id;
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            return view('pages.users.profileEdit', compact('user'));
        }
    }
    public function edit(Request $request, $id)
    {

        $country = Country::where('flag', '1')->get();
        $state = State::where('flag', '1')->get();
        $city = City::where('flag', '1')->get();
        $area = Area::where('flag', '1')->get();
        $account = Account::where('flag', '1')->get();
        $organization = Organization::where('flag', '1')->get();
        $branch = Branch::where('flag', '1')->get();
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            return view('pages.users.userInfoEdit', compact('user', 'country', 'state', 'city', 'area', 'account', 'organization', 'branch'));
        }
    }

    public function update(Request $request, $id)
    {
        //logic to update a userInfo from here.


        if (User::where('id', $id)->exists()) {
            $user  = User::find($id);
            $user->name =    is_null($request->name) ? $user->name : $request->name;

            $user->first_name =    is_null($request->first_name) ? $user->first_name : $request->first_name;
            $user->last_name = is_null($request->last_name) ? $user->last_name : $request->last_name;
            $user->father_name = is_null($request->father_name) ? $user->father_name : $request->father_name;
            $user->cnic = is_null($request->cnic) ? $user->cnic : $request->cnic;
            $user->dob = is_null($request->dob) ? $user->dob : $request->dob;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password = is_null($request->password) ? Hash::make($user->password) : Hash::make($request->password);
            $user->phone = is_null($request->phone) ? $user->phone : $request->phone;
            $user->address = is_null($request->address) ? $user->address : $request->address;
            $user->account_id = is_null($request->account_id) ? $user->account_id : $request->account_id;
            $user->organization_id = is_null($request->organization_id) ? $user->organization_id : $request->organization_id;
            $user->branch_id = is_null($request->branch_id) ? $user->branch_id : $request->branch_id;
            $user->country_id = is_null($request->country_id) ? $user->country_id : $request->country_id;
            $user->state_id = is_null($request->state_id) ? $user->state_id : $request->state_id;
            $user->city_id = is_null($request->city_id) ? $user->city_id : $request->city_id;
            $user->area_id = is_null($request->area_id) ? $user->area_id : $request->area_id;

            $user->status = is_null($request->status) ? $user->status : $request->status;
            $user->flag = is_null($request->flag)  ?  $user->flag : $request->flag;

            $user->save();

            if( $user->account_id==1)
            return redirect()->route('userInfo.index')->with('success', 'Account Updated successfully');
            else
            return   redirect()->route('customerDashboard')->with('success', 'Account Updated successfully');
        }
    }

    public function destroy($id)
    {
        //logic to delete a userInfo 

        if (User::where('id', $id)->exists()) {

            $userInfo = User::find($id);

            $userInfo->flag = 0;

            $userInfo->save();
            return redirect()->route('userInfo.index')->with('success', 'User deleted successfully');

            // return response()->json([

            //     "message" => "records updated successfully"
            // ], 200);
        } else {
            return response()->json([
                "message" => "Account not found"
            ], 404);
        }
    }
}
