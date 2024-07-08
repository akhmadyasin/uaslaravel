@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <p class="display-4 fw-lighter text-center fst-italic fw-bold">PemPross</p>
                    <p class="lead text-center fw-light text-capitalize">Selamat datang di Sistem Pendukung Keputusan Pemilihan Program Studi!</p>
                    <p class=" text-center text-uppercase">Metode Weight Product</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
