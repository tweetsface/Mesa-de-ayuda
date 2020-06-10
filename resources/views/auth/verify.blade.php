@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica tu correo Electronico</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           Se ha enviado un link de verificacion a tu correo
                        </div>
                    @endif

                    Antes de seguir, por favor revisa nuevamente tu correo.
                    Si no recibiste el link en tu correo
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Presiona aqui para enviar nuevamente</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
