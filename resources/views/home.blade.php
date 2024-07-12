@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="background-color: #bbdefb; padding: 20px;">
        <div class="col-md-8">
        <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background-color: #64b5f6;">{{ __('Home') }}</div>

                <div class="card-body" style="background-color: #e3f2fd;">
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
