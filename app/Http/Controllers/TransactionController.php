<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enums\TransactionType;
use App\Enums\TransactionStatus;
use App\Mail\DepositDeclinedMail;
use App\Mail\ReferralDepositMail;
use App\Mail\DepositConfirmedMail;
use App\Mail\WithdrawalDeclinedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalConfirmedMail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('users.transactions.index', compact('transactions'));
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
        $transaction = Transaction::findOrFail($id);
        $transaction->status = $request->input('status');
        $transaction->update();

        if ($request->input('status') == trim(TransactionStatus::Confirm->value) && $transaction->type == trim(TransactionType::Withdrawal->value)) {
            Mail::to($transaction->users->email)->send(new WithdrawalConfirmedMail($transaction));
            return to_route('transactions');
        } elseif ($request->input('status') == trim(TransactionStatus::Decline->value) && $transaction->type == trim(TransactionType::Withdrawal->value)) {
            Mail::to($transaction->users->email)->send(new WithdrawalDeclinedMail($transaction));
            return to_route('transactions');
        }

        if ($request->input('status') == trim(TransactionStatus::Confirm->value) && $transaction->type == trim(TransactionType::Deposit->value)) {
            Mail::to($transaction->users->email)->send(new DepositConfirmedMail($transaction));
            if ($request->input('status') == trim(TransactionStatus::Confirm->value) && $transaction->users->referrer_id >= 1) {
                $commissionAmount = ((10 / 100) * $transaction->amount);
                $deposit = new Transaction;
                $deposit->user_id = $transaction->users->referrer_id;
                $deposit->amount =  $commissionAmount;
                $deposit->wallet_name = 'USDT';
                $deposit->status = TransactionStatus::Confirm;
                $deposit->type = TransactionType::ReferralBonus;
                $deposit->save();
                $refereeEmail = User::where('id', $transaction->users->referrer_id)->pluck('email')->all();
                $refereeName = User::where('id', $transaction->users->referrer_id)->pluck('first_name')->all();
                Mail::to($refereeEmail[0])->send(new ReferralDepositMail($commissionAmount, $refereeName[0]));
            }
        } elseif ($request->input('status') == trim(TransactionStatus::Decline->value) && $transaction->type == trim(TransactionType::Deposit->value)) {
            Mail::to($transaction->users->email)->send(new DepositDeclinedMail($transaction));
        }
        return to_route('transactions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
