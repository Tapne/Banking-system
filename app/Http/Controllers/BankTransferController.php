<?php

namespace App\Http\Controllers;

use App\Balance;
use App\HistoryBankTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankTransferController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('bank.banktransfer_history', [
            'transfers' => HistoryBankTransfer::join('balances', 'history_bank_transfers.num_acc_to', '=', 'balances.num_acc_bank')->join('users', 'balances.id_acc', '=', 'users.id')->select('users.*', 'history_bank_transfers.*')->where('history_bank_transfers.id_acc', Auth::user()->id)->orderBy('history_bank_transfers.id','desc')->get(),
        ]);
    }

    public function create()
    {
        return view('bank.banktransfer_add');
    }

    public function store(Request $request)
    {
        $money_max = Balance::where('id', Auth::user()->id)->first()->money;
        $request->validate([
            'accnumber' => 'required|exists:balances,num_acc_bank',
            'money' => "required|numeric|gt:0|numeric|lte:$money_max",
            'description' => 'required|max:200|min:3',
        ]);


        Balance::where('id', Auth::user()->id)->update([
            'money' => $money_max-$request->money,
        ]);

        HistoryBankTransfer::create([
            'id_acc' => Auth::user()->id,
            'amount' => '-'.$request->money,
            'num_acc_to' => $request->accnumber,
            'description' => $request->description,
        ]);

        Balance::where('num_acc_bank', $request->accnumber)->update([
           'money' =>  Balance::where('num_acc_bank', $request->accnumber)->first()->money+$request->money,
        ]);

        HistoryBankTransfer::create([
           'id_acc' => Balance::where('num_acc_bank', $request->accnumber)->first()->id_acc,
            'amount' => '+'.$request->money,
            'num_acc_to' => Balance::where('id_acc', Auth::user()->id)->first()->num_acc_bank,
            'description' => $request->description,
        ]);

        return redirect()->route('banktransfer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('bank.banktransfer_description', [
            'transfer' => HistoryBankTransfer::join('balances', 'history_bank_transfers.num_acc_to', '=', 'balances.num_acc_bank')->join('users', 'balances.id_acc', '=', 'users.id')->select('users.name', 'users.surname', 'history_bank_transfers.*', 'balances.id_acc', 'balances.num_acc_bank')->where('history_bank_transfers.id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
