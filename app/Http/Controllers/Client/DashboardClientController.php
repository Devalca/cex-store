<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardClientController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        $transactions  = Transaction::where("users_id", Auth::user()->id)->orderBy('id', 'desc')->take(5);
        return view('pages.client.dashboard', [
            'transaction_data' => $transactions->latest()->paginate(10),
            'user' => $user
        ]);
    }
}
