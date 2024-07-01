@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Edit Kriteria') }}</span>
                    <a href="{{ url('kriteria') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
                <form class="d-flex flex-column align-items-center" action="{{ url('kriteria', $kriteria->id) }}" method="post">
                @method('patch')
                @csrf    
                <div class="mb-4 w-50">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $kriteria->name }}" autofocus required>
                        </div>
                        <div class="mb-4 w-50">
                            <label class="form-label">Label</label>
                            <select name="label" class="form-control" value="{{ $kriteria->label }}" required>
                                <option value="cost">Cost</option>
                                <option value="benefit">Benefit</option>
                            </select>
                        </div>
                        <div class="mb-4 w-50">
                            <label class="form-label">Bobot</label>
                            <input type="number" step="0.01" name="bobot" class="form-control" value="{{ $kriteria->bobot }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection