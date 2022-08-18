<?php

namespace App\Http\Controllers;

use App\Models\Game;

class DetailController extends Controller
{

    public function index(Game $game)
    {
        return view('/detail', [
            'game' => $game
        ]);
    }

   
    // public function add(Request $request, $id){
    //     $data = [
    //         'products_id' => $id,
    //         'users_id' => Auth::user()->id
    //     ];

    //     Cart::create($data);

    //     return redirect()->route('cart');
    // }
}
