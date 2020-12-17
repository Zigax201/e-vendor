<?php

namespace App\Http\Controllers\API;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $product_id = $request->input('product_id');
        $status = $request->input('status');


        if ($id) {
            $transaction = Transaction::with(['product'])->find($id);

            return ($transaction) ? ResponseFormatter::success($transaction, 'Data transaksi berhasil diambil')
            : ResponseFormatter::error(null, 'Data is empty', 404);
        }

        $transaction = Transaction::with(['product', 'user'])->where('user_id', Auth::user()->id);

        if($product_id){
            $transaction->where('product_id', $product_id);
        }
        if ($status) {
            $transaction->where('status', $status);
        }


        return ResponseFormatter::success(
            $transaction->paginate($limit), 'Transaksi Fetched'
        );
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return ResponseFormatter::success($transaction, 'Transaction Updated');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required',
            'total_price' => 'required',
            'status' => 'required',
            'shipping_address' => 'required'
        ]);

        $transaction = Transaction::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'shipping_address' => $request->shipping_address,
            'transaction_url' => ''
        ]);

        // konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.severKey');
        Config::$clientKey = config('services.midtrans.clientKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Panggil transaksi yg telah dibuat
        $transaction = Transaction::with(['product', 'user'])->find($transaction->id);

        // Membuat transaksi midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->total_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments'=> ['gopay', 'bank_transfer'],
            'vtweb' => []

        ];

        // Memanggil midtrans
        try {
            // Ambil halaman payment midtrans
            $transaction_url = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->transaction_url = $transaction_url;
            $transaction->save();

            // Mengembalikan data ke API
            return ResponseFormatter::success($transaction, 'Transaksi Berhasil');

        } catch (Exception $th) {
            return ResponseFormatter::error($th->getMessage(), 'Transaksi gagal' );
        }


    }
}
