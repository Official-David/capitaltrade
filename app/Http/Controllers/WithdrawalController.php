<?php

namespace App\Http\Controllers;

use App\Enums\TransactionStatus;
use App\Enums\TransactionType;
use App\Models\Withdrawal;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.withdrawals.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        if ($request->input('amount') > Auth::User()->account_balance) {
            return redirect()->back()->withErrors(['withdrawalError' => 'Your account balance is low']);
        }

        $withdrawal = new Transaction;
        $withdrawal->user_id = Auth::User()->id;
        $withdrawal->amount = $request->input('amount');
        $withdrawal->wallet_name = 'USDT';
        $withdrawal->address = $request->input('address');
        $withdrawal->status = TransactionStatus::Pending;
        $withdrawal->type = TransactionType::Withdrawal;
        $withdrawal->save();
        return back()->with('withdrawalSuccess', 'Withdrawal Request Submitted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Withdrawal $withdrawal)
    {
        //
    }
}
