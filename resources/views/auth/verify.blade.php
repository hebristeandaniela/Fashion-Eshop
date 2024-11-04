@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificați-vă adresa de e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nou link de verificare a fost trimis la adresa ta de e-mail.') }}
                        </div>
                    @endif

                    {{ __('Înainte de a continua, vă rugăm să verificați e-mailul pentru un link de verificare.') }}
                    {{ __('Dacă nu ați primit e-mailul') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('faceți clic aici pentru a solicita altul') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
