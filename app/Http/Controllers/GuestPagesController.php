<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enums\TransactionType;
use App\Enums\TransactionStatus;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class GuestPagesController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $withdrawals = Transaction::latest()->where('type', TransactionType::Withdrawal)->where('status', TransactionStatus::Confirm)->take(5)->get();
        $deposits = Transaction::latest()->where('type', TransactionType::Deposit)->where('status', TransactionStatus::Confirm)->take(5)->get();
        return view('guests.index', compact('packages', 'withdrawals', 'deposits'));
    }

    public function services()
    {
        return view('guests.services');
    }
    public function about()
    {
        return view('guests.about');
    }
    public function contact()
    {
        return view('guests.contact-us');
    }
    public function sendEmail(Request $request)
    {
        if (Mail::to(config('custom.support_email'))->send(new ContactUsMail($request))) {
            return to_route('contact')->with('success', 'Email Sent');
        } else {
            return to_route('contact')->with('error', 'Something Went Wrong');
        }
    }
}
