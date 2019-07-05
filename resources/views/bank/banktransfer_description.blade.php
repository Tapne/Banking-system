@extends('bank.layouts.inside')

@section('content')
<div class="container-fluid">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="row justify-content-center mb-3">
        <a href="{{ url('/home') }}" class="btn btn-outline-dark">Konto bankowe</a>
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col display-4">
            Opis transakcji
        </div>
    </div>
    <div class="row mt-3">
        <div class="card w-100">
            <div class="card-body text-center">
                <p class="card-text"><b>Od:</b> {{ $transfer->name }} {{ $transfer->surname }} </p>
                <p class="card-text"><b>Numer konta: </b> {{ $transfer->num_acc_bank }} </p>
            </div>
        </div>
        <div class="card-group w-100">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><b>Kwota: </b><b  @if($transfer->amount < 0) style="color: red;" @else style="color: green;" @endif >{{ $transfer->amount }}</b></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><b>Opis: </b> {{ $transfer->description }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><b>Data przelewu: </b>{{ $transfer->created_at }} </div></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
