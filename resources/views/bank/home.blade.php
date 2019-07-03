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
                            <!-- numer konta bankowego -->
                            {{ $numer_acc_bank }}
                        </div>
                        <div class="col align-self-end">
                            <i class="fas fa-university home-card fa-3x"></i>
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
                            <!-- stan konta bankowego -->
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
                            <i class="fas fa-university home-card fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    Stan konta
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="row card-text text-center justify-content-center">
                        <div class="col home-card">
                            a
                        </div>
                        <div class="col align-self-end">
                            <i class="fas fa-university home-card fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    Stan konta
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <form class="form-inline">
            <div class="form-group mr-1">
                <button class="btn btn-primary">Zrób przelew</button>
            </div>
            <div class="form-group mr-1">
                <button class="btn btn-primary">a</button>
            </div>
            <div class="form-group mr-1">
                <button formaction="{{ url('/addressbook') }}" class="btn btn-outline-dark">Książka adresowa</button>
            </div>
        </form>
    </div>

</div>
@endsection
