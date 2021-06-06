<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\Location\countryRequest;

class countryController extends Controller
{


    public function index(Country $model)
    {
        // return view('pages.location.country', ['countries' => $model->paginate(15)]);
        try {
            $country = Country::where('flag', '1')->get();
            return view('pages.location.countryDisplay', compact('country'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(Country $model)
    {
        return view('pages.location.country', ['countries' => $model->paginate(15)]);
    }
    //
    public function getAllCountries()
    {
        // logic to get all students
        $countries = Country::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($countries, 200);
    }

    public function store(countryRequest $request)
    {
        //logic to create a country 
        try {
            $country = $request->all();

            $country = new Country;
            $country->name = $request->name;
            $country->shortName = $request->shortName;
            $country->description = $request->description;
            // $country->status = $request->status;
            // $country->flag = $request->flag;
            $country->status = 'Active';
            $country->flag =  '1';
            $country->save();
            return redirect()->route('country.index')->with('success', 'Country created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
      //  logic to get a country here 
        if (Country::where('id', $id)->where('flag', '1')->exists()) {
            $country = Country::where('id', $id)->get();
            return response($country, 200);


        } else {
            return response()->json([
                "message" => "Country not found"
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        if (Country::where('id', $id)->exists()) {
            $country = Country::find($id);
            return view('pages.location.countryEdit', compact('country'));
        }
    }

    public function update(Request $request, $id)
    {
        //logic to update a country from here.


        if (Country::where('id', $id)->exists()) {
            $country = Country::find($id);


            $country->name = is_null($request->name) ? $country->name : $request->name;
            $country->shortName = is_null($request->shortName) ? $country->shortName : $request->shortName;
            $country->description = is_null($request->description) ? $country->description : $request->description;
            $country->status = is_null($request->status) ? $country->status : $request->status;
            $country->flag = is_null($request->flag)  ?  $country->flag : $request->flag;

            $country->save();

            return redirect()->route('country.index')->with('success', 'Country Updated successfully');

        }
    }

    public function destroy($id)
    {
        //logic to delete a country 

        if (Country::where('id', $id)->exists()) {

            $country = Country::find($id);

            $country->flag = 0;

            $country->save();
            return redirect()->route('country.index')->with('success', 'Country created successfully');

            // return response()->json([

            //     "message" => "records updated successfully"
            // ], 200);
        } else {
            return response()->json([
                "message" => "Country not found"
            ], 404);
        }
    }
}
