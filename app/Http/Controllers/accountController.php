<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\accountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index(Account $model)
    {
        // return view('pages.users.account', ['countries' => $model->paginate(15)]);
        try {
            $account = Account::where('flag', '1')->get();
            return view('pages.users.accountDisplay', compact('account'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(Account $model)
    {
        return view('pages.users.account', ['countries' => $model->paginate(15)]);
    }
    //
    public function getAllCountries()
    {
        // logic to get all students
        $countries = Account::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($countries, 200);
    }

    public function store(accountRequest $request)
    {
        //logic to create a account 
        try {
            $account = $request->all();

            $account = new Account;
            $account->name = $request->name;
            $account->shortName = $request->shortName;
            $account->description = $request->description;
            // $account->status = $request->status;
            // $account->flag = $request->flag;
            $account->status = 'Active';
            $account->flag =  '1';
            $account->save();
            return redirect()->route('account.index')->with('success', 'Account created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        //  logic to get a account here 
        if (Account::where('id', $id)->where('flag', '1')->exists()) {
            $account = Account::where('id', $id)->get();
            return response($account, 200);
        } else {
            return response()->json([
                "message" => "Account not found"
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        if (Account::where('id', $id)->exists()) {
            $account = Account::find($id);
            return view('pages.users.accountEdit', compact('account'));
        }
    }

    public function update(Request $request, $id)
    {
        //logic to update a account from here.


        if (Account::where('id', $id)->exists()) {
            $account = Account::find($id);


            $account->name = is_null($request->name) ? $account->name : $request->name;
            $account->shortName = is_null($request->shortName) ? $account->shortName : $request->shortName;
            $account->description = is_null($request->description) ? $account->description : $request->description;
            $account->status = is_null($request->status) ? $account->status : $request->status;
            $account->flag = is_null($request->flag)  ?  $account->flag : $request->flag;

            $account->save();

            return redirect()->route('account.index')->with('success', 'Account Updated successfully');
        }
    }

    public function destroy($id)
    {
        //logic to delete a account 

        if (Account::where('id', $id)->exists()) {

            $account = Account::find($id);

            $account->flag = 0;

            $account->save();
            return redirect()->route('account.index')->with('success', 'Account created successfully');

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
