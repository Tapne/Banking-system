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
            Wszystkie transakcje
        </div>
    </div>
    <div class="row mt-3" id="historytableall">
        <div class="col">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię i nazwisko</th>
                    <th scope="col">Kwota</th>
                    <th scope="col">Data</th>
                    <th scope="col">Szczegóły</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transfers as $transfer)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transfer->name }} {{ $transfer->surname }}</td>
                        <td @if($transfer->amount < 0) style="color: red;  font-weight: bold;" @else style="color: green; font-weight: bold;" @endif >{{ $transfer->amount }}</td>
                        <td>{{ $transfer->created_at }}</td>

                    <td>
                        <form>
                            <button formaction="{{ route('banktransfer.show', $transfer->id) }}" class="btn btn-info">Szczegóły</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
