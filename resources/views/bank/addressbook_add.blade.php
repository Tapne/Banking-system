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
            Dodawanie pozycji
        </div>
    </div>
    <form action="{{ route('addressbook.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputOwnName">Własna nazwa</label>
            <input type="text" class="form-control" id="exampleInputOwnName" aria-describedby="emailHelp" placeholder="Wpisz nazwę" name="ownname">
            <small id="ownnameHelp" class="form-text text-muted">Przykładowa przyjazna nazwa.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Imię</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="Wpisz imię" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputSurname">Nazwisko</label>
            <input type="text" class="form-control" id="exampleInputSurname" placeholder="Wpisz nazwisko" name="surname">
        </div>
        <div class="form-group">
            <label for="exampleInputNumacc">Numer konta bankowego</label>
            <input type="number" min="100000000" max="999999999" class="form-control" id="exampleInputName" placeholder="Wpisz numer" name="accnumber">
        </div>
        <button type="submit" class="btn btn-success">Dodaj pozycję</button>
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
