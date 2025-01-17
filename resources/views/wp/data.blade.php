@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="">
            <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #bbdefb">
                    <span>{{ __('Perhitungan') }}</span>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Alternatif</th>
                                <th scope="col">Preferensi</th>
                                <th scope="col">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->alt_id }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->hasil }}</td>
                                    <td>{{ $result->hasil / $sum }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col-md-8 -->
    </div> <!-- /.row -->
</div> <!-- /.container -->
@endsection
