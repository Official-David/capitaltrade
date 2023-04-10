<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enums\TransactionType;
use App\Enums\TransactionStatus;
use App\Mail\DepositMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deposits = Transaction::latest()->where('user_id', Auth::User()->id)->get();
        return view('users.userTransactions.index', compact('deposits'));
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
        $deposit = new Transaction;
        $deposit->user_id = Auth::User()->id;
        $deposit->amount = $request->input('amount');
        $deposit->wallet_name = $request->input('wallet_name');
        $deposit->hash = $request->input('hash');
        $deposit->status = TransactionStatus::Pending;
        $deposit->type = TransactionType::Deposit;
        $deposit->save();
        Mail::to(Auth::User()->email)->send(new DepositMail($request, trim(TransactionStatus::Pending->value)));
        return to_route('user.transactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
