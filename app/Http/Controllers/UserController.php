<?php

namespace App\Http\Controllers;

use App\Enums\InvestmentStatus;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Package;
use App\Models\Investment;
use App\Models\UserWallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enums\TransactionType;
use App\Enums\TransactionStatus;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        $users = User::count();
        $wallets = Wallet::latest()->get();
        $deposits = Transaction::latest()->where('user_id', Auth::User()->id)->where('type', TransactionType::Deposit)->take(5)->get();
        $pendingDeposits = Transaction::where('type', TransactionType::Deposit)->where('status', TransactionStatus::Pending)->count();
        $investments = Investment::latest()->where('user_id', Auth::User()->id)->take(5)->get();
        $ongoingInvestments = Investment::where('status', InvestmentStatus::Confirm)->count();
        $endedInvestments = Investment::where('status', InvestmentStatus::End)->count();
        $withdrawals =Transaction::latest()->where('user_id', Auth::User()->id)->where('type', TransactionType::Withdrawal)->take(5)->get();

        return view('users.dashboard', compact('packages', 'users', 'wallets', 'deposits', 'withdrawals', 'investments', 'pendingDeposits', 'ongoingInvestments', 'endedInvestments'));
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
        //
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

    /**
     * Display the user profile.
     */
    public function profile(Request $request)
    {
        $users = User::latest()->get(['id', 'first_name', 'last_name', 'email', 'status', 'created_at']);
        $wallets = Wallet::latest()->get();
        $userWallets = UserWallet::where('user_id', Auth::User()->id)->get();
        return view('users.profile', compact('users', 'wallets', 'userWallets'));
    }

    public function viewUserReferrals($id)
    {
        $users = User::where('referrer_id', $id)->get();

        return view('users.referrals', compact('users'));
    }
}
