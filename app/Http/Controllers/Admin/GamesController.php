<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{

    public function listgame()
    {
        return view('pages.admin.games.listgame', [
            'games'=>Game::latest()->paginate(10),
        ]);
    }
     
    public function create()
    {
        return view('pages.admin.games.create');
    }

    public function store()
    {
        request()->validate([
            'name'=>'required',
            'photo'=>'required',
            'price'=>'required',
            'description'=>'required',
            'categories'=>'required'
        ]);

        Game::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'photo' => request()->file('photo')->store('images/games'),
            'price'=> request('price'),
            'description'=> request('description'),
            'categories'=> request('categories')
        ]);


        return back()->with('success', 'Berhasil Tambah Data');
    }

    public function edit(Game $game)
    {
        return view('pages.admin.games.edit', [
            'game' => $game,
        ]);
    }

    public function update(Game $game)
    {
        request()->validate([
            'name'=>'required',
        ]);

        if(request('photo')) {
            Storage::delete($game->photo);
            $photo = request()->file('photo')->store('images/games');
        } elseif ($game->photo) {
            $photo = $game->photo;
        } else {
            $photo = null;
        }

        $game->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'photo' => $photo,
            'price'=> request('price'),
            'description'=> request('description'),
            'categories'=> request('categories')
        ]);


        return back()->with('success', 'Data Berhasil Di Update');
    }

    public function destroy(Game $game)
    {
        Storage::delete($game->photo);
        $game->delete($game->id);

        return back()->with('success', 'Data Berhasil Di Hapus');
    }

}
