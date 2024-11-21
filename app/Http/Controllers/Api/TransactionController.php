<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return TransactionResource::collection(Transaction::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:bill,payment,deposit,withdrawal',
            'description' => 'nullable|string'
        ]);

        $user = User::findOrFail($validatedData['user_id']);

        // Adjust balance based on transaction type
        $amount = $validatedData['amount'];
        switch($validatedData['type']) {
            case 'bill':
            case 'withdrawal':
                $amount = -$amount;
                break;
            case 'deposit':
            case 'payment':
                $amount = abs($amount);
                break;
        }

        $user->updateBalance($amount);

        $transaction = Transaction::create($validatedData);
        return new TransactionResource($transaction);
    }

    public function show(Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'amount' => 'sometimes|numeric|min:0.01',
            'type' => 'sometimes|in:bill,payment,deposit,withdrawal',
            'description' => 'nullable|string'
        ]);

        $transaction->update($validatedData);
        return new TransactionResource($transaction);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json(null, 204);
    }
}
