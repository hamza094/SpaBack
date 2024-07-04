<?php

namespace App\Http\Controllers;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(Request $request){
        $items = Item::all();
        return response()->json($items);
    }

    function show($id){
        $item = Item::find($id);
        return response()->json($item);
    }

    function store(Request $request){
        $item = new Item([
            "name" => $request->name,
            "price" => $request->price,
            "user_id" => Auth::user()->id,
            'description' => $request->description,
            
        ]);
        $item->save();
        return response()->json($item, 201);
    }

    function update($id, Request $request){
        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description=$request->description
        $item->save();
        return response()->json($item);
    }

    function destroy($id){
        $item = Item::find($id);
        $item->delete();
        return response(null, 204);
    }
}
