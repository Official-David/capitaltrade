<?php

namespace App\Http\Controllers;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $wallet = new UserWallet;
        $wallet->user_id = Auth::User()->id;
        $wallet->wallet_name = $request->input('wallet_name');
        $wallet->address = $request->input('address');
        $wallet->save();

        return to_route('profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserWallet $userWallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserWallet $userWallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserWallet $userWallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserWallet $userWallet)
    {
        //
    }
}
