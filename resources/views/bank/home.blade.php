@extends('bank.layouts.inside')

@section('content')
<div class="container-fluid">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="row justify-content-center mt-2">
        <div class="col-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row card-text text-center justify-content-center">
                        <div class="col home-card">
                            {{ $numer_acc_bank }}
                        </div>
                        <div class="col align-self-end">
                            <i class="fas fa-university home-card-ico fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    Numer konta
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="row card-text text-center justify-content-center">
                        <div class="col home-card">
                            {{ $balance }}
                        </div>
                        <div class="col align-self-end">
                            <i class="fas fa-wallet home-card-ico fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    Stan konta
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="row card-text text-center justify-content-center">
                        <div class="col home-card">
                            a
                        </div>
                        <div class="col align-self-end">
                            <i class="fas fa-university home-card-ico fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    a
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="row card-text text-center justify-content-center">
                        <div class="col">
                            {{ $created_acc }}
                        </div>
                        <div class="col align-self-end">
                            <i class="fas fa-id-badge home-card-ico fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    Data założenia konta
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <form class="form-inline">
            <div class="form-group mr-1">
                <button formaction="{{ url('/banktransfer/create') }}" class="btn btn-outline-dark">Zrób przelew</button>
            </div>
            <div class="form-group mr-1">
                <button formaction="{{ url('/addressbook') }}" class="btn btn-outline-dark">Książka adresowa</button>
            </div>
        </form>
    </div>


    <div class="row text-center">
        <div class="col display-4">
            Ostatnie transakcje
            <form>
                <button formaction="{{ url('/banktransfer') }}" class="btn btn-outline-dark">Wyświetl wszystkie</button>
            </form>
        </div>
    </div>
    <div class="row mt-3" id="historytable">
        <div class="col">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię i nazwisko</th>
                    <th scope="col">Kwota</th>
                    <th scope="col">Data</th>
                </tr>
                </thead>
                <tbody>
                @foreach($history_bank_transfers as $transfer)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $transfer->name }} {{ $transfer->surname }}</td>
                    <td @if($transfer->amount < 0) style="color: red;  font-weight: bold;" @else style="color: green; font-weight: bold;" @endif >{{ $transfer->amount }}</td>
                    <td>{{ $transfer->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
