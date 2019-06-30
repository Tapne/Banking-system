@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Zweryfikuj swój adres email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Nowy link weryfikacyjny został wysłany na Twoj adres E-Mail.
                        </div>
                    @endif

                    Sprawdź swój E-Mail w celu weryfikacji.
                    Jeśli nie otrzymałeś E-Maila, <a href="{{ route('verification.resend') }}">kliknij tutaj aby wysłać następny.</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
