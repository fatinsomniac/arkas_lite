<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transactions.index', [
            'activities'   => Activity::orderBy('id', 'desc')->get(),
            'items'        => Item::orderBy('id', 'desc')->get(),
            'transactions' => Transaction::with('activity', 'item')->orderBy('id', 'desc')->get(),
        ]);
    }

    public function store(TransactionRequest $request)
    {
        $uuid = strtolower(Str::uuid(32));
        
        //transaction_code
        $rand_number = rand(10000, 100000); 
        $date = date('dmy');
        $transaction_code = $rand_number.$date;

        //total_price
        $item_id = $request->item_id;
        $harga = Item::find($item_id)->price;
        $total = $request->quantity * $harga;

        Transaction::create([
            'uuid'             => $uuid,
            'transaction_code' => $transaction_code,
            'customer_name'    => $request->customer_name,
            'activity_id'      => $request->activity_id,
            'item_id'          => $request->item_id,
            'quantity'         => $request->quantity,
            'total_price'      => $total
        ]);

        return back()->with('success', 'Data berhasil disimpan.');
    }

    public function edit($uuid)
    {
        $transaction = Transaction::where('uuid', $uuid)->first();

        return view('transactions.edit', [
            'transaction' => $transaction,
            'activities'  => Activity::orderBy('id', 'desc')->get(),
            'items'       => Item::orderBy('id', 'desc')->get(),
        ]);
    }

    public function update(TransactionRequest $request, $uuid)
    {
        //total_price
        $item_id = $request->item_id;
        $harga = Item::find($item_id)->price;
        $total = $request->quantity * $harga;
        
        Transaction::where('uuid', $uuid)->update([
            'customer_name' => $request->customer_name,
            'activity_id'   => $request->activity_id,
            'item_id'       => $request->item_id,
            'quantity'      => $request->quantity,
            'total_price'   => $total
        ]);

        return redirect('transactions')->with('update', 'Data berhasil diupdate.');
    }

    public function destroy($uuid)
    {
        Transaction::where('uuid', $uuid)->delete();

        return back()->with('delete', 'Data berhasil dihapus.');
    }
}
