<?php

namespace App\Http\Controllers;

use App\Models\points_managment;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class points_managementController extends Controller
{
    // Points Management
    //
    public function index(points_managment $model)
    {
        // return view('pages.location.country', ['countries' => $model->paginate(15)]);
        try {
            $points_management = points_managment::where('flag', '1')->get();
            // return view('pages.organizations.organizationDisplay', compact('organization'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(points_managment $model)
    {
        return view('pages.organizations.organization', ['organizations' => $model->paginate(15)]);
    }
    
    public function getAllPoints()
    {
        $id = auth()->user()->id;

        // logic to get points by user_id
        $Add_Points = DB::select('(SELECT sum(points) as A FROM points_managment where type = "add" and user_id = ' . $id . ')');
        $Minus_Points = DB::select('(SELECT sum(points) as B FROM points_managment where type = "Minus" and user_id = ' . $id . ')');
        $Total_Points = (int)$Add_Points[0]->A - (int)$Minus_Points[0]->B;
        return response()->json([
           
             $Total_Points,
             ], 200);
    }


    public function store(Request $request)
    {
        //logic to create a country 
        try {
            $points_management = $request->all();

            $points_management = new points_managment();
            $points_management->user_id =  FacadesAuth::user()->id;
            $points_management->transaction_id = $request->transaction_id;
            $points_management->reward_id = $request->reward_id;
            $points_management->points = $request->points;
            $points_management->type = $request->type;
            $points_management->status = 'Active';
            $points_management->flag =  '1';
            $points_management->save();
            // return redirect()->route('organization.index')->with('success', 'Organization created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        //  logic to get a country here 
        if (points_managment::where('id', $id)->where('flag', '1')->exists()) {
            $points_management = points_managment::where('id', $id)->get();
            return response($points_management, 200);
        } else {
            return response()->json([
                "message" => "Points not found"
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        if (points_managment::where('id', $id)->exists()) {
            $points_management = points_managment::find($id);
            // return view('pages.organizations.organizationEdit', compact('organization'));
        }
    }


    public function update(Request $request, $id)
    {

        if (points_managment::where('id', $id)->exists()) {
            $points_management = points_managment::find($id);


            $points_management->user_id = is_null($request->user_id) ? $points_management->user_id : $points_management->user_id;
            $points_management->transaction_id = is_null($request->transaction_id) ? $points_management->transaction_id : $request->transaction_id;
            $points_management->reward_id = is_null($request->reward_id) ? $points_management->reward_id : $request->reward_id;
            $points_management->points = is_null($request->points) ? $points_management->points : $request->points;
            $points_management->type = is_null($request->type) ? $points_management->type : $request->type;
            $points_management->status = is_null($request->status) ? $points_management->status : $request->status;
            $points_management->flag = is_null($request->flag)  ?  $points_management->flag : $request->flag;

            $points_management->save();

            // return redirect()->route('organization.index')->with('success', 'Organization Updated successfully');
        }
    }

    public function destroy($id)
    {

        if (points_managment::where('id', $id)->exists()) {

            $points_management = points_managment::find($id);
            $points_management->flag = 0;

            $points_management->save();
            // return redirect()->route('organization.index')->with('success', 'Organization created successfully');

        } else {
            return response()->json([
                "message" => "Organization not found"
            ], 404);
        }
    }
}
