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
            Dodawanie przelewu
        </div>
    </div>
    <form action="{{ route('banktransfer.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputNumacc">Numer konta bankowego</label>
            <input type="number" min="100000000" max="999999999" class="form-control" id="exampleInputName" placeholder="Wpisz numer" name="accnumber" value="{{ old('accnumber') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputMoney">Kwota</label>
            <input type="number" min="0,01" max="999999" class="form-control" id="exampleInputMoney" placeholder="Wpisz kwotę" name="money">
        </div>
        <div class="form-group">
            <label for="exampleAreaDescription">Opis</label>
            <textarea class="form-control" id="exampleAreaDescription" placeholder="Wpisz opis" name="description">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Dodaj przelew</button>
    </form>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger mt-3">
            {{ $error }}
        </div>
        @endforeach
    @endif
</div>
@endsection
