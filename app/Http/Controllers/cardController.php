<?php

namespace App\Http\Controllers;

use App\Http\Requests\Card\cardRequest;
use App\Models\card;
use Illuminate\Http\Request;

class cardController extends Controller
{
    
        public function index(card $model)
        {
             try {
                $card= card::where('flag', '1')->get();
                return view('pages.cards.cardDisplay', compact('card'));
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function create(card $model)
        {
            return view('pages.cards.card', ['cards' => $model->paginate(15)]);
        }
        //
        public function getAllCards()
        {
            // logic to get all students
            $card = card::where('flag', '1')->get()->toJson(JSON_PRETTY_PRINT);
            return response($card, 200);
        }
        public function store(cardRequest $request)
        {
            //logic to create a country 
            try {
                $card = $request->all();
    
                $card = new card();
                $card->title = $request->title;
                $card->shortName = $request->shortName;
                $card->description = $request->description;
                $card->joining_bonus = $request->joining_bonus;
                $card->minimum_bonus = $request->minimum_bonus;
                $card->validaty = $request->validaty;
                $card->status = 'Active';
                $card->flag =  '1';
                $card->save();
                return redirect()->route('card.index')->with('success', 'Card created successfully');
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        public function show($id)
        {
            //  logic to get a country here 
            if (card::where('id', $id)->where('flag', '1')->exists()) {
                $card = card::where('id', $id)->get();
                return response($card, 200);
            } else {
                return response()->json([
                    "message" => "Card not found"
                ], 404);
            }
        }
    
        public function edit(Request $request, $id)
        {
            if (card::where('id', $id)->exists()) {
                $card = card::find($id);
                return view('pages.cards.cardEdit', compact('card'));
            }
        }
    
        public function update(Request $request, $id)
        {
            //logic to update a country from here.
    
    
            if (card::where('id', $id)->exists()) {
                $card = card::find($id);
    
    
                $card->title = is_null($request->title) ? $card->title : $request->title;
                $card->shortName = is_null($request->shortName) ? $card->shortName : $request->shortName;
                $card->description = is_null($request->description) ?$card->description : $request->description;
                $card->joining_bonus = is_null($request->joining_bonus) ?$card->joining_bonus : $request->joining_bonus;
                $card->minimum_bonus = is_null($request->minimum_bonus) ?$card->minimum_bonus : $request->minimum_bonus;
                $card->validaty = is_null($request->validaty) ?$card->validaty : $request->validaty;

                $card->status = is_null($request->status) ? $card->status : $request->status;
                $card->flag = is_null($request->flag)  ?  $card->flag : $request->flag;
    
                $card->save();
    
                return redirect()->route('card.index')->with('success', 'Card Updated successfully');
            }
        }
    
        public function destroy($id)
        {
            //logic to delete a country 
    
            if (card::where('id', $id)->exists()) {
    
                $card = card::find($id);
    
                $card->flag = 0;
    
                $card->save();
                return redirect()->route('card.index')->with('success', 'Card created successfully');
    
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
 