<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

use Exception;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    public function process()
    {

        $user = Auth::user();
        $code = 'ETP-' . mt_rand(0000000, 999999);

        request()->validate([
            'nickname' => 'required',
            'game_id' => 'required',
            'server_id' => 'required',
            'phone_number' => 'required',
            'total_cost' => 'required',
        ]);

        $transaction = Transaction::create([
            'users_id' => $user->id,
            'total_cost' => request('total_cost'),
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'products_id' => request('products_id'),
            'nickname' => request('nickname'),
            'phone_number' => request('phone_number'),
            'server_id' => request('server_id'),
            'game_id' => request('game_id'),
            'price' => request('total_cost'),
            'shipping_status' => 'PENDING',
            'code' => $code
        ]);

        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) request('total_cost'),
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay', 'bca_va', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function callback()
    {

        try {

            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            $notification = new Notification();

            $status = $notification->transaction_status;
            $type = $notification->payment_type;
            $fraud = $notification->fraud_status;
            $order_id = $notification->order_id;

            $transaction = Transaction::where('code', $order_id)->firstOrFail();
            $transactiondetail = TransactionDetail::with('transaction')->where('transactions_id', $transaction->id);

            if ($status == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $transaction->status = 'PENDING';
                    } else {
                        $transaction->status = 'SUCCESS';
                    }
                }
            } else if ($status == 'settlement') {
                $transaction->transaction_status = 'PAID';
                $transactiondetail->update(['shipping_status' => 'PROCESS']);
            } else if ($status == 'pending') {
                $transaction->transaction_status = 'PENDING';
            } else if ($status == 'deny') {
                $transaction->transaction_status = 'CANCELLED';
                $transactiondetail->update(['shipping_status' => 'CANCEL']);
            } else if ($status == 'expired') {
                $transaction->transaction_status = 'CANCELLED';
                $transactiondetail->update(['shipping_status' => 'CANCEL']);
            } else if ($status == 'cancel') {
                $transaction->transaction_status = 'CANCELLED';
                $transactiondetail->update(['shipping_status' => 'CANCEL']);
            }

            $transaction->save();

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

}
