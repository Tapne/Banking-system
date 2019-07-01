<?php

namespace App\Http\Controllers;

use App\Balance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('bank.home', [
            'balance' => Balance::where('id_acc', Auth::user()->id)->first()->money." zł",
            'numer_acc_bank' => Balance::where('id_acc', Auth::user()->id)->first()->num_acc_bank,
        ]);
    }
}
