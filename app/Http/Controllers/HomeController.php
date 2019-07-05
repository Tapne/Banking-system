<?php

namespace App\Http\Controllers;

use App\Balance;
use App\HistoryBankTransfer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bank.home', [
            'balance' => Balance::where('id_acc', Auth::user()->id)->first()->money." zł",
            'numer_acc_bank' => Balance::where('id_acc', Auth::user()->id)->first()->num_acc_bank,
            'created_acc' => Balance::where('id_acc', Auth::user()->id)->first()->created_at,
            'history_bank_transfers' => HistoryBankTransfer::join('balances', 'history_bank_transfers.num_acc_to', '=', 'balances.num_acc_bank')->join('users', 'balances.id_acc', '=', 'users.id')->select('users.*', 'history_bank_transfers.*')->orderBy('history_bank_transfers.id','desc')->where('history_bank_transfers.id_acc', Auth::user()->id)->take(10)->get(),
        ]);
    }
}
