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
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #bbdefb">
                    <span>{{ __('Alternatif') }}</span>
                    <a href="{{ url('alternatif/add') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatif as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                    <a href="{{ url('alternatif/edit',$item->id) }}" type="button" class="btn btn-primary btn-sm">Edit </a>
                                    <form action="{{ url('alternatif', $item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data ?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection