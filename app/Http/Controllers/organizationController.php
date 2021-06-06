<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class organizationController extends Controller
{
    //
    public function index(Organization $model)
    {
        // return view('pages.location.country', ['countries' => $model->paginate(15)]);
        try {
            $organization = Organization::where('flag', '1')->get();
            return view('pages.organizations.organizationDisplay', compact('organization'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(Organization $model)
    {
        return view('pages.organizations.organization', ['organizations' => $model->paginate(15)]);
    }
    //
    public function getAllOrganizations()
    {
        // logic to get all students
        $organization = Organization::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($organization, 200);
    }
    public function store(Request $request)
    {
        //logic to create a country 
        try {
            $organization = $request->all();

            $organization = new Organization();
            $organization->name = $request->name;
            $organization->shortName = $request->shortName;
            $organization->description = $request->description;
            // $country->status = $request->status;
            // $country->flag = $request->flag;
            $organization->status = 'Active';
            $organization->flag =  '1';
            $organization->save();
            return redirect()->route('organization.index')->with('success', 'Organization created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        //  logic to get a country here 
        if (Organization::where('id', $id)->where('flag', '1')->exists()) {
            $organization = Organization::where('id', $id)->get();
            return response($organization, 200);
        } else {
            return response()->json([
                "message" => "Organization not found"
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        if (Organization::where('id', $id)->exists()) {
            $organization = Organization::find($id);
            return view('pages.organizations.organizationEdit', compact('organization'));
        }
    }

    public function update(Request $request, $id)
    {
        //logic to update a country from here.


        if (Organization::where('id', $id)->exists()) {
            $organization = Organization::find($id);


            $organization->name = is_null($request->name) ? $organization->name : $request->name;
            $organization->shortName = is_null($request->shortName) ? $organization->shortName : $request->shortName;
            $organization->description = is_null($request->description) ?$organization->description : $request->description;
            $organization->status = is_null($request->status) ? $organization->status : $request->status;
            $organization->flag = is_null($request->flag)  ?  $organization->flag : $request->flag;

            $organization->save();

            return redirect()->route('organization.index')->with('success', 'Organization Updated successfully');
        }
    }

    public function destroy($id)
    {
        //logic to delete a country 

        if (Organization::where('id', $id)->exists()) {

            $organization = Organization::find($id);

            $organization->flag = 0;

            $organization->save();
            return redirect()->route('organization.index')->with('success', 'Organization created successfully');

            // return response()->json([

            //     "message" => "records updated successfully"
            // ], 200);
        } else {
            return response()->json([
                "message" => "Organization not found"
            ], 404);
        }
    }
}
