@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Edit Alternatif') }}</span>
                    <a href="{{ url('alternatif') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
                <form class="d-flex flex-column align-items-center" action="{{ url('alternatif', $alternatif->id) }}" method="post">
                @method('patch')
                @csrf    
                    <div class="mb-4 w-50"></div>
                        <div class="mb-4">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="=form-control" value="{{ $alternatif->name }}" autofocus required>
                        </div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection