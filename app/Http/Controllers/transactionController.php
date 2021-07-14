<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class transactionController extends Controller
{

    public function index(transaction $model)
    {
        // return view('pages.transactions.country', ['countries' => $model->paginate(15)]);
        try {

            // $user = User::join('transactions', 'users.id', '=', 'transactions.user_id')->get(['name']);

            // $card = card::where('flag', '1')->get();

            $tran =  FacadesDB::table('transactions')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                //  ->join('cards', 'cards.id', '=', 'transactions.user_id')
                ->select('transactions.*', 'users.name')
                ->where([
                    'transactions.flag' => '1'
                ])->get();


            return view('pages.transactions.transactionDisplay', compact( 'tran'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function getUser($id)
    {
        $user = User::join('transactions', 'users_info.id', '=', $id)->get(['first_name']);
        return view('pages.transactions.transactionDisplay', compact('user'));
    }
    public function show($id)
    {
        //  logic to get a country here 
        if (transaction::where('id', $id)->where('flag', '1')->exists()) {
            $user = User::where('flag', '1')->get();
            $card = card::where('flag', '1')->get();
            return view('pages.transactions.transactionDisplay', compact('user', 'card', 'transaction'));
        } else {
            return response()->json([
                "message" => "Transaction not found"
            ], 404);
        }
    }

    public function create(transaction $model)
    {
        $user = User::where('flag', '1')->get();
        $card = card::where('flag', '1')->get();
        $transaction = transaction::where('flag', '1')->get();
        return view('pages.transactions.transaction', ['transaction' => $model->paginate(15)], compact('user', 'card'));
    }

    //
    public function getAllTransaction()
    {
        //code
        $transaction = transaction::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($transaction, 200);
    }
    public function store(Request $request)
    {
        //code
        try {
            $transaction = new transaction();
            $transaction->user_id = $request->user_id;
            $transaction->card_id = $request->card_id;
            $transaction->net_amount = $request->net_amount;
            $transaction->earn_points = $request->earn_points;
            $transaction->description = $request->description;
            $transaction->status =  "Active";
            $transaction->flag =  "1";
            $transaction->save();

            return redirect()->route('transaction.index')->with('success', 'Trasaction added successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function getTransaction($id)
    {
        //code
        if (transaction::where('id', $id)->where('flag', '1')->exists()) {
            $transaction = User::where(['id' => $id, 'flag' => '1'])->get();
            return response($transaction, 200);
        } else {
            return response()->json([
                "message" => "Transaction not found"
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {
        if (transaction::where('id', $id)->exists()) {


            $transaction = transaction::find($id);
            $user = User::where(['flag' => '1', 'id' => $transaction->user_id])->get();
            $card = Card::where(['flag' => '1', 'id' => $transaction->card_id])->get();

            return view('pages.transactions.transactionEdit', compact('user', 'card', 'transaction'));
        }
    }


    public function update(Request $request, $id)
    {
        //code
        if (transaction::where('id', $id)->exists()) {
            $transaction = transaction::find($id);
            $transaction->user_id = is_null($request->user_id) ? $transaction->user_id : $request->user_id;
            $transaction->card_id = is_null($request->card_id) ? $transaction->card_id : $request->card_id;
            $transaction->net_amount = is_null($request->net_amount) ? $transaction->net_amount : $request->net_amount;
            $transaction->earn_points = is_null($request->earn_points) ? $transaction->earn_points : $request->earn_points;
            $transaction->description = is_null($request->description) ? $transaction->description : $request->description;

            $transaction->status = is_null($request->status) ? $transaction->status : $request->status;
            $transaction->flag = is_null($request->flag)  ?  $transaction->flag : $request->flag;
            $transaction->save();
            return redirect()->route('transaction.index')->with('success', 'Transaction Updated successfully');

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
        if (transaction::where('id', $id)->exists()) {
            $transaction = transaction::find($id);

            $transaction->flag = 0;

            $transaction->save();

            return redirect()->route('transaction.index')->with('success', 'Transaction deleted  successfully');
        } else {
            return response()->json([
                "message" => "Transaction not found"
            ], 404);
        }
    }
}
