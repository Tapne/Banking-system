<?php

namespace App\Http\Controllers;

use App\AddressBook;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bank.addressbook', [
            'address_book' => AddressBook::all()->where('id_acc', Auth::user()->id),
        ]);
    }

    public function create()
    {
        return view('bank.addressbook_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ownname' => 'required|max:30|min:3',
            'name' => 'required|max:30|min:3',
            'surname' => 'required|max:30|min:3',
            'accnumber' => 'required|exists:balances,num_acc_bank',
        ]);

        AddressBook::insert([
            'id_acc' => Auth::user()->id,
            'own_name' => $request->ownname,
            'name' => $request->name,
            'surname' => $request->surname,
            'num_acc_bank_another' => $request->accnumber
        ]);

        return redirect()->route('addressbook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bank.addressbook_edit', [
            'edit_post' => AddressBook::where('id', $id)->first(),
        ]);
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
        $request->validate([
            'ownname' => 'required|max:30|min:3',
            'name' => 'required|max:30|min:3',
            'surname' => 'required|max:30|min:3',
            'accnumber' => 'required|exists:balances,num_acc_bank',
        ]);

        AddressBook::where('id', $id)->update([
            'own_name' => $request->ownname,
            'name' => $request->name,
            'surname' => $request->surname,
            'num_acc_bank_another' => $request->accnumber
        ]);

        return redirect()->route('addressbook.index');
    }

    public function destroy($id)
    {
        AddressBook::where('id', $id)->where('id_acc', Auth::user()->id)->delete();
        return redirect()->route('addressbook.index');
    }
}
