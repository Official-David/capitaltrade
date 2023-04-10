<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::latest()->get();
        return view('users.wallets.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wallet = new Wallet;
        $wallet->name = $request->input('name');
        $wallet->wallet_address = $request->input('address');
        $wallet->status = $request->input('status');
        if (isset($request->qr_code)) {
            $path = 'storage/'. $request->qr_code->store('qr_code', 'public');
            $wallet->qr_code = $path;
        }
        $wallet->save();
        return to_route('wallets');
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
        $wallet = Wallet::findOrFail($id);
        return view('users.wallets.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->name = $request->input('name');
        $wallet->wallet_address = $request->input('address');
        $wallet->status = $request->input('status');
        if (isset($request->qr_code)) {
            $path = 'storage/'. $request->qr_code->store('qr_code', 'public');
            $wallet->qr_code = $path;
        }
        $wallet->update();
        return to_route('wallets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wallet::findOrFail($id)->delete();
        return to_route('wallets');
    }
}
