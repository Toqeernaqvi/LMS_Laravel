<?php

namespace App\Http\Controllers;

use App\Http\Requests\Location\areaRequest;
use App\Http\Requests\Location\cityRequest;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
use Illuminate\Http\Request;

class areaController extends Controller
{
    //

    
    public function index()
    {
        // return view('pages.location.country', ['countries' => $model->paginate(15)]);
        try {
            $country = Country::where('flag', '1')->get();

          
            $area = Area::where([
                'flag' => '1'
            ])->get();
 
             return view('pages.location.areaDisplay', compact('country', 'area'));
            
        } catch (\Exception $e) {
          
            // return $e->getMessage();
        }
    }


    public function create(Area $model)
    {
        $country = Country::where('flag', '1')->get();
        $state = state::where('flag', '1')->get();
        $area = area::where('flag', '1')->get();

        return view('pages.location.area', ['areas' => $model->paginate(15)], compact('country'));
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
                "message" => "City not found"
            ], 404);
        }
    }
    public function getArea($id)
    {
        //code
        if (City::where('id', $id)->where('flag', '1')->exists()) {
            $area = Area::where(['city_id' => $id, 'flag' => '1'])->get();
           

            return response($area, 200);
        } else {
            return response()->json([
                "message" => "Area not found"
            ], 404);
        }
    }

    public function show($id)
    {
         $country = Country::where('id', $id)->get();
        $state = State::where('id', $id)->get();
        $city = City::where('id', $id)->get();
        $area = Area::where('flag', '1')->get();

        
        return view('pages.location.areaDisplay', compact('area','city', 'state', 'country'));
    }
    //
    public function getAllArea()
    {
        //code
        $area= Area::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($area, 200);
    }
    public function store(areaRequest $request)
    {
        //code
        try {
            $area = new Area;
            $area->country_id = $request->country_id;
           $area->state_id = $request->state_id;
           $area->city_id = $request->city_id;

           $area->name = $request->name;
           $area->shortName = $request->shortName;
           $area->description = $request->Description;
           $area->status =  "Active";
           $area->flag = 1;
           $area->save();

            return redirect()->route('city.index')->with('success', 'Area added successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Request $request, $id)
    {
        if (Area::where('id', $id)->exists()) {
          
           
            $area= Area::find($id);
            $state = area::where(['flag' => '1', 'id' =>$area->state_id])->get();
            $country = area::where(['flag' => '1', 'id' =>$area->country_id])->get();
            $city = area::where(['flag' => '1', 'id' =>$area->city_id])->get();

            return view('pages.location.cityEdit', compact('area','city','state','country'));
        }
    }

    public function update(Request $request, $id)
    {
        //code
        if (Area::where('id', $id)->exists()) {
           $area = Area::find($id);
           $area->country_id = is_null($request->name) ?$area->country_id : $request->country_id;
           $area->state_id = is_null($request->name) ?$area->state_id : $request->state_id;
           $area->name = is_null($request->name) ?$area->name : $request->name;
           $area->shortName = is_null($request->shortName) ?$area->shortName : $request->shortName;
           $area->description = is_null($request->description) ?$area->description : $request->description;
           $area->status = is_null($request->status) ?$area->status : $request->status;
           $area->flag = is_null($request->flag)  ? $area->flag : $request->flag;
           $area->save();

            return redirect()->route('area.index')->with('success', 'Area Updated successfully');
        }

    }
    public function destroy($id)
    {
        if (Area::where('id', $id)->exists()) {
           $area = Area::find($id);

           $area->flag = 0;

           $area->save();

            return redirect()->route('area.index')->with('success', 'area deleted  successfully');

        } else {
            return response()->json([
                "message" => "Area not found"
            ], 404);
        }
    }
}
