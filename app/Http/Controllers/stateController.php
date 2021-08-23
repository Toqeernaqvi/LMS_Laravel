<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Country;
 use App\Http\Controllers\DB;
use App\Http\Controllers\countryController;
use App\Http\Requests\Location\stateRequest;

class stateController extends Controller
{

    public function index(State $model)
    {
        // return view('pages.location.country', ['countries' => $model->paginate(15)]);
        try {
            $country = Country::where('flag', '1')->get();

            $state = State::where([
                'flag' => '1'
            ])->get();
            return view('pages.location.stateDisplay', compact('state', 'country'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
 
    public function show($id)
    {
        //  logic to get a country here 
        if (Country::where('id', $id)->where('flag', '1')->exists()) {
            $state = State::where('flag', '1')->get();

            $country = Country::where('id', $id)->get();
            return view('pages.location.stateDisplay', compact('state', 'country'));
        } else {
            return response()->json([
                "message" => "Country not found"
            ], 404);
        }
    }

    public function create(State $model)
    {
        $country = Country::where('flag', '1')->get();
        return view('pages.location.state', ['states' => $model->paginate(15)], compact('country'));
    }

    //
    public function getAllState()
    {
        //code
        $state = State::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($state, 200);
    }

    public function store(stateRequest $request)
    {
        //code
        try {
            $state = new State;
            $state->country_id = $request->country_id;
            $state->name = $request->name;
            $state->shortName = $request->shortName;
            $state->description = $request->description;
            $state->status =  "Active";
            $state->flag =  "1";
            $state->save();

            return redirect()->route('state.index')->with('success', 'State added successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function getState($id)
    {
        //code
        if (Country::where('id', $id)->where('flag', '1')->exists()) {
            $state = State::where(['country_id'=> $id,'flag' => '1' ] )->get();
            return response($state, 200);
        } else {
            return response()->json([
                "message" => "State not found"
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        if (State::where('id', $id)->exists()) {
          
           
            $state= State::find($id);
            $country = Country::where(['flag' => '1', 'id' => $state->country_id])->get();
            return view('pages.location.stateEdit', compact('state','country'));
        }
    }


    public function update(Request $request, $id)
    {
        //code
        if (State::where('id', $id)->exists()) {
            $state = State::find($id);
            $state->country_id = is_null($request->country_id) ? $state->country_id : $request->country_id;
            $state->name = is_null($request->name) ? $state->name : $request->name;
            $state->shortName = is_null($request->shortName) ? $state->shortName : $request->shortName;
            $state->description = is_null($request->description) ? $state->description : $request->description;
            $state->status = is_null($request->status) ? $state->status : $request->status;
            $state->flag = is_null($request->flag)  ?  $state->flag : $request->flag;
            $state->save();
            return redirect()->route('state.index')->with('success', 'State Updated successfully');

            // return response()->json([

            //     "message" => "records updated successfully"
            // ], 200);
            // } else {
            // return response()->json([
            //     "message" => "State not found"
            // ], 404);

        }
    }

    public function destroy($id)
    {
        //code
        if (State::where('id', $id)->exists()) {
            $state = State::find($id);

            $state->flag = 0;

            $state->save();

            return redirect()->route('state.index')->with('success', 'State deleted  successfully');
        } else {
            return response()->json([
                "message" => "State not found"
            ], 404);
        }
    }
}
