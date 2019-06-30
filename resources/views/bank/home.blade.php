@extends('bank.layouts.inside')

@section('content')
<div class="container-fluid">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-3">
            <div class="card">
                <div class="card-header text-right">
                    a
                </div>
                <div class="card-body">
                    <p class="card-text">
                        a
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-right">
                    Stan konta
                </div>
                <div class="card-body">
                    <p class="card-text text-center">
                         zł
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-right">a</div>
                <div class="card-body">
                    <p class="card-text">
                        a
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-right">a</div>
                <div class="card-body">
                    <p class="card-text">
                        a
                    </p>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
