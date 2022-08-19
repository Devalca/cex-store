<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $buyTransactions = Transaction::where("users_id", Auth::user()->id)->orderBy('id', 'desc')->take(10);

        return view('pages.client.dashboard-transactions',[
            'transaction_data' => $buyTransactions->get(),
            'user' => $user
        ]);
    }

    public function details(Request $request, $id)
    {
        $user = Auth::user();
        $transaction = Transaction::where('id', $id)->get();
        $transactionDetail = TransactionDetail::where('transactions_id', $transaction[0]->id)->with(['transaction.user'])->get();

        return view('pages.client.dashboard-transactions-details',[
            'user' => $user,
            'transactionDetail' => $transactionDetail,
            'transaction' => $transaction
        ]);
    }
}
