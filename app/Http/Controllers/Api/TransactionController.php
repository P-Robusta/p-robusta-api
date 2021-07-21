<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Donor;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Transaction::all(), 'Get successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'amount' => 'required|numeric|min:1',
            'id_donor' => 'required|exists:donors,id'
        ]);

        $donor = Donor::find($input['id_donor']);

        $donor->total = $donor->total + $input['amount'];

        $donor->save();

        $transaction = Transaction::create($input);

        return $this->sendResponse($transaction, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return $this->sendResponse($transaction, 'Created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $input = $request->validate([
            'amount' => 'numeric|min:1',
            'id_donor' => 'exists:donors,id'
        ]);
        $donor = Donor::find($transaction->id_donor);

        $donor->total = $donor->total - $transaction->amount;

        $donor->save();

        $transaction->update($input);

        $donor->total = $donor->total + $input['amount'];

        $donor->save();

        return $this->sendResponse($transaction, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $donor = Donor::find($transaction->id_donor);

        $donor->total = $donor->total - $transaction->amount;

        $donor->save();

        $transaction->delete();

        return $this->sendResponse($transaction, 'Deleted successfully.');
    }
}
