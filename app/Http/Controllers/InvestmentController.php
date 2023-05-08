<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Investment;
use App\Models\Transaction;
use App\Mail\InvestmentMail;
use Illuminate\Http\Request;
use App\Rules\InvestmentRule;
use App\Enums\TransactionType;
use App\Enums\InvestmentStatus;
use App\Enums\TransactionStatus;
use App\Mail\InvestmentDeclinedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvestmentConfirmedMail;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investments = Investment::latest()->where('user_id', Auth::User()->id)->get();
        return view('users.investment.index', compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($packageName, $id)
    {
        $package = Package::findOrFail($id);
        return view('users.investment.create', compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $packageName, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $minimumDeposit = Package::where('id', $id)
        ->pluck('minimum_deposit')->all();
        $maximumDeposit = Package::where('id', $id)
        ->pluck('maximum_deposit')
        ->all();
    

        if ($request->input('amount') > Auth::User()->account_balance) {
            return redirect()->back()->withErrors(['investmentError' => 'Your account balance is low']);
        }

        if ($request->input('amount') < $minimumDeposit[0]) {
            return redirect()->back()->withErrors(['minimumInvestmentError' => 'Your investment amount is lower than the minimum investment capital']);
        }

        if ($request->input('amount') > $maximumDeposit[0]) {
            return redirect()->back()->withErrors(['maximumInvestmentError' => 'Maximum investment capital exceeded!']);
            
        }

        $investment = new Investment;
        $investment->user_id = Auth::User()->id;
        $investment->package_id = $id;
        $investment->amount = $request->input('amount');
        $investment->next_run = now()->addHours(24);
        $investment->status = InvestmentStatus::Confirm;
        $investment->save();

        $deposit = new Transaction;
        $deposit->user_id = $investment->users->id;
        $deposit->amount = $investment->amount;
        $deposit->wallet_name = 'USDT';
        $deposit->status = trim(TransactionStatus::Confirm->value);
        $deposit->type = trim(TransactionType::Investment->value);
        $deposit->save();
        Mail::to($investment->users->email)->send(new InvestmentConfirmedMail($investment));

        return to_route('user.investments')->with('investmentSuccess', 'Investment request submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Investment $investment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $investment = Investment::findOrFail($id);
        // $investment->status = $request->input('status');
        // $investment->update();
        // if ($request->input('status') == trim(InvestmentStatus::Confirm->value)) {
        //     $deposit = new Transaction;
        //     $deposit->user_id = $investment->users->id;
        //     $deposit->amount = $investment->amount;
        //     $deposit->wallet_name = 'USDT';
        //     $deposit->status = trim(TransactionStatus::Confirm->value);
        //     $deposit->type = trim(TransactionType::Investment->value);
        //     $deposit->save();
        //     Mail::to($investment->users->email)->send(new InvestmentConfirmedMail($investment));
        // } elseif ($request->input('status') == trim(InvestmentStatus::Decline->value)) {
        //     $deposit = new Transaction;
        //     $deposit->user_id = $investment->users->id;
        //     $deposit->amount = $investment->amount;
        //     $deposit->wallet_name = 'USDT';
        //     $deposit->status = trim(TransactionStatus::Decline->value);
        //     $deposit->type = trim(TransactionType::Investment->value);
        //     $deposit->save();
        //     Mail::to($investment->users->email)->send(new InvestmentDeclinedMail($request));
        // }
        // return to_route('investments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function showUsersInvestment()
    {
        $investments = Investment::latest()->get();
        return view('users.investment.all-investments', compact('investments'));
    }
}