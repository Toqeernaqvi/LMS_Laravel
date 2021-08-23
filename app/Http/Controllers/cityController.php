<?php

namespace App\Http\Controllers;

use App\Http\Requests\Location\cityRequest;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class cityController extends Controller
{

    public function index(City $model)
    {
        // return view('pages.location.country', ['countries' => $model->paginate(15)]);
        try {
            $country = Country::where('flag', '1')->get();

            $state = State::where([
                'flag' => '1'
            ])->get();

            $city = City::where([
                'flag' => '1'
            ])->get();

             return view('pages.location.cityDisplay', compact('city','state', 'country'));
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create(City $model)
    {
        $country = Country::where('flag', '1')->get();
        $state = state::where('flag', '1')->get();
        return view('pages.location.city', ['cities' => $model->paginate(15)], compact('country'));
    }
    public function getState($id)
    {
        //code
        if (Country::where('id', $id)->where('flag', '1')->exists()) {
            $state = State::where(['country_id' => $id, 'flag' => '1'])->get();
            return response($state, 200);
        } else {
            return response()->json([
                "message" => "State not found"
            ], 404);
        }
    }

    public function getCity($id)
    {
        //code
        if (State::where('id', $id)->where('flag', '1')->exists()) {
            $city = City::where(['state_id' => $id, 'flag' => '1'])->get();
            return response($city, 200);
        } else {
            return response()->json([
                "message" => "State not found"
            ], 404);
        }
    }


    public function show($id)
    {
        //  logic to get a country here 

        $state = State::where('flag', '1')->get();
        $city = City::where('id', $id)->get();

        $country = Country::where('id', $id)->get();
        return view('pages.location.cityDisplay', compact('city', 'state', 'country'));
    }
    //
    public function getAllCity()
    {
        //code
        $city = City::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($city, 200);
    }
    public function store(cityRequest $request)
    {
        //code
        try {
            $city = new City;
            $city->country_id = $request->country_id;
            $city->state_id = $request->state_id;
            $city->name = $request->name;
            $city->shortName = $request->shortName;
            $city->description = $request->Description;
            $city->status =  "Active";
            $city->flag = 1;
            $city->save();

            return redirect()->route('city.index')->with('success', 'State added successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Request $request, $id)
    {
        if (City::where('id', $id)->exists()) {
          
           
            $city= City::find($id);
            $state = state::where(['flag' => '1', 'id' => $city->state_id])->get();
            $country = state::where(['flag' => '1', 'id' => $city->country_id])->get();

            return view('pages.location.cityEdit', compact('city','state','country'));
        }
    }

    public function update(Request $request, $id)
    {
        //code
        if (City::where('id', $id)->exists()) {
            $city = City::find($id);
            $city->country_id = is_null($request->name) ? $city->country_id : $request->country_id;
            $city->state_id = is_null($request->name) ? $city->state_id : $request->state_id;
            $city->name = is_null($request->name) ? $city->name : $request->name;
            $city->shortName = is_null($request->shortName) ? $city->shortName : $request->shortName;
            $city->description = is_null($request->description) ? $city->description : $request->description;
            $city->status = is_null($request->status) ? $city->status : $request->status;
            $city->flag = is_null($request->flag)  ?  $city->flag : $request->flag;
            $city->save();

            return redirect()->route('city.index')->with('success', 'City Updated successfully');
        }

    }
    public function destroy($id)
    {
        if (City::where('id', $id)->exists()) {
            $city = City::find($id);

            $city->flag = 0;

            $city->save();

            return redirect()->route('city.index')->with('success', 'city deleted  successfully');

        } else {
            return response()->json([
                "message" => "City not found"
            ], 404);
        }
    }
}
