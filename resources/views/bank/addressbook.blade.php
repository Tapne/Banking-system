@extends('bank.layouts.inside')

@section('content')
<div class="container-fluid">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="row text-center">
        <div class="col display-4">
            Książka adresowa
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <a href="{{ route('addressbook.create') }}" class="btn btn-outline-dark mr-2">Dodaj pozycje</a>
        <a href="{{ url('/home') }}" class="btn btn-outline-dark">Konto bankowe</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Własna nazwa</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Numer konta</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($address_book as $address)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                {{ $address->own_name }}
            </td>
            <td>
                {{ $address->name }}
            </td>
            <td>
                {{ $address->surname }}
            </td>
            <td>
                {{ $address->num_acc_bank_another }}
            </td>
            <td>
                <form action="{{ route('addressbook.edit', $address->id) }}" method="get">
                    <button class="btn btn-primary">Edytuj</button>
                </form>
            </td>
            <td>
                <form action="{{ route('addressbook.destroy', $address->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
