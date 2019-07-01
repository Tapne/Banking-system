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
            <div class="card">
                <div class="card-header text-center">
                    Numer konta
                </div>
                <div class="card-body">
                    <p class="card-text text-center">
                        {{ $numer_acc_bank }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    Stan konta
                </div>
                <div class="card-body">
                    <p class="card-text text-center">
                        {{ $balance }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    a
                </div>
                <div class="card-body">
                    <p class="card-text text-center">
                        {{ $balance }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">a</div>
                <div class="card-body">
                    <p class="card-text text-center">
                        a
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-2">
        <form class="form-inline">
            <div class="form-group mr-1">
                <button type="submit" class="btn btn-primary">Zrób przelew</button>
            </div>
            <div class="form-group mr-1">
                <button type="submit" class="btn btn-primary">a</button>
            </div>
            <div class="form-group mr-1">
                <button type="submit" class="btn btn-primary">a</button>
            </div>
        </form>
    </div>

</div>
@endsection
