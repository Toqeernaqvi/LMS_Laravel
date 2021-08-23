<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rewards\rewardRequest;
use App\Models\reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class rewardController extends Controller
{
    //
    public function index(reward $model)
    {
        try {
            $reward = reward::where('flag', '1')->get();

            return view('pages.rewards.rewardDisplay', compact('reward'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function customerRewardDisplay(reward $model)
    {
        try {
            $reward = reward::where('flag', '1')->get();
            $id = Auth::user()->id;



            $tran =  FacadesDB::table('transactions')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                //  ->join('cards', 'cards.id', '=', 'transactions.user_id')
                ->select('transactions.*', 'users.name')
                ->where([
                    'transactions.flag' => '1',
                    'transactions.user_id' => $id
                ])->get();
                $Add_Points = DB::select('(SELECT sum(points) as A FROM points_managment where type = "add" and user_id = ' . $id . ')');
                $Minus_Points = DB::select('(SELECT sum(points) as B FROM points_managment where type = "Minus" and user_id = ' . $id . ')');
                $Total_Points = (int)$Add_Points[0]->A - (int)$Minus_Points[0]->B;
            return view('pages.rewards.customerRewardDisplay', compact('reward', 'tran' ,'Total_Points'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(reward $model)
    {
        return view('pages.rewards.reward', ['rewards' => $model->paginate(15)]);
    }
    //
    public function getAllRewards()
    {
        // logic to get all students
        $reward = reward::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($reward, 200);
    }
    public function store(rewardRequest $request)
    {
         
        try {
             $reward = $request->all();
            $reward = new reward();
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);

            $name = $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->move(public_path("/uploads"), $name);

            $reward->name =  $name;
            $reward->path =  $path;

            /////////////
            $reward->title = $request->title;
            $reward->total_points = $request->total_points;
            $reward->description = $request->description;

            $reward->status = 'Active';
            $reward->flag =  '1';
            $reward->save();
            return redirect()->route('reward.index')->with('success', 'Reward created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        //  logic to get a country here 
        if (reward::where('id', $id)->where('flag', '1')->exists()) {
            $reward = reward::where('id', $id)->get();
            return response($reward, 200);
        } else {
            return response()->json([
                "message" => "Reward not found"
            ], 404);
        }
    }
    public function getRewards($id)
    {
        //  logic to get a country here 
        if (reward::where('id', $id)->where('flag', '1')->exists()) {
            $reward = reward::where('id', $id)->get();
            return response($reward, 200);
        } else {
            return response()->json([
                "message" => "Reward not found"
            ], 404);
        }
    }
    public function edit(Request $request, $id)
    {
        if (reward::where('id', $id)->exists()) {
            $reward = Reward::find($id);
            return view('pages.rewards.rewardEdit', compact('reward'));
        }
    }

    public function update(Request $request, $id)
    {
        //logic to update a country from here.


        if (reward::where('id', $id)->exists()) {
            $reward = reward::find($id);

            //code for image
            ///////////

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);

            $name = $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->move(public_path("/uploads"), $name);

            $reward->name =  $name;
            $reward->path =  $path;

            /////////////

            $reward->title = is_null($request->title) ? $reward->title : $request->title;
            $reward->total_points = is_null($request->total_points) ? $reward->total_points : $request->total_points;
            $reward->name = is_null($request->name) ? $reward->name : $request->name;
            $reward->path = is_null($request->path) ? $reward->path : $request->path;

            $reward->description = is_null($request->description) ? $reward->description : $request->description;
            $reward->status = is_null($request->status) ? $reward->status : $request->status;
            $reward->flag = is_null($request->flag)  ?  $reward->flag : $request->flag;

            $reward->save();

            return redirect()->route('reward.index')->with('success', 'Reward Updated successfully');
        }
    }

    public function destroy($id)
    {
        //logic to delete a country 

        if (reward::where('id', $id)->exists()) {

            $reward = reward::find($id);

            $reward->flag = 0;

            $reward->save();
            return redirect()->route('reward.index')->with('success', 'Reward Deleted successfully');

            // return response()->json([

            //     "message" => "records updated successfully"
            // ], 200);
        } else {
            return response()->json([
                "message" => "Reward not found"
            ], 404);
        }
    }
}
