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
}
