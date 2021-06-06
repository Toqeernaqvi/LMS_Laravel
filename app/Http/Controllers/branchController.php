<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use App\Models\Organization;
use Illuminate\Http\Request;

class branchController extends Controller
{
    //
    public function index(Branch $model)
    {
        // return view('pages.location.country', ['countries' => $model->paginate(15)]);
        try {
            $organization = Organization::where('flag', '1')->get();

            $branch = Branch::where([
                'flag' => '1'
            ])->get();
            return view('pages.organizations.branchDisplay', compact('branch', 'organization'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
 
    public function show($id)
    {
        //  logic to get a country here 
        if (Organization::where('id', $id)->where('flag', '1')->exists()) {
            $branch = Branch::where('flag', '1')->get();

            $organization = Organization::where(['id'=> $id,'flag' => '1' ])->get();
            return view('pages.organizations.branchDisplay', compact('branch', 'organization'));
        } else {
            return response()->json([
                "message" => "Organization not found"
            ], 404);
        }
    }

    public function create(Branch $model)
    {
        $organization = Organization::where('flag', '1')->get();
        return view('pages.organizations.branch', ['branches' => $model->paginate(15)], compact('organization'));
    }

    //
    public function getAllBranches()
    {
        //code
        $branch = Branch::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($branch, 200);
    }
    public function store(Request $request)
    {
        //code
        try {
            $branch = new Branch;
            $branch->organization_id = $request->organization_id;
            $branch->name = $request->name;
            $branch->shortName = $request->shortName;
            $branch->description = $request->description;
            $branch->status =  "Active";
            $branch->flag =  "1";
            $branch->save();

            return redirect()->route('branch.index')->with('success', 'Branch added successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function getBranch($id)
    {
        //code
        if (Organization::where('id', $id)->where('flag', '1')->exists()) {
            $branch = Branch::where(['organization_id'=> $id,'flag' => '1' ] )->get();
            return response($branch, 200);
        } else {
            return response()->json([
                "message" => "Branch not found"
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        if (Branch::where('id', $id)->exists()) {
          
           
            $branch= Branch::find($id);
            $organization = Organization::where(['flag' => '1', 'id' => $branch->organization_id])->get();
         
             return view('pages.organizations.branchEdit', compact('branch','organization'));
        }
    }


    public function update(Request $request, $id)
    {
        //code
        if (Branch::where('id', $id)->exists()) {
            $branch = Branch::find($id);
            $branch->organization_id = is_null($request->organization_id) ? $branch->organization_id : $request->organization_id;
            $branch->name = is_null($request->name) ? $branch->name : $request->name;
            $branch->shortName = is_null($request->shortName) ? $branch->shortName : $request->shortName;
            $branch->description = is_null($request->description) ? $branch->description : $request->description;
            $branch->status = is_null($request->status) ? $branch->status : $request->status;
            $branch->flag = is_null($request->flag)  ?  $branch->flag : $request->flag;
            $branch->save();
            return redirect()->route('branch.index')->with('success', 'Branch Updated successfully');

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
        if (Branch::where('id', $id)->exists()) {
            $branch = Branch::find($id);

            $branch->flag = 0;

            $branch->save();

            return redirect()->route('branch.index')->with('success', 'Branch deleted  successfully');
        } else {
            return response()->json([
                "message" => "Branch not found"
            ], 404);
        }
    }
}
