@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('words.edit') }} {{ $employee->name }}</h1>

        <form method="post" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="mb-3">
                    <label class="form-label">{{ __('words.name') }}</label>
                    <input type="text" name="name" value="{{ $employee->name }}" class="form-control">
                    @error('name')
                    <div class=" text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('words.email') }}</label>
                    <input type="text" name="email" value="{{ $employee->email }}" class="form-control">
                    @error('email')
                    <div class=" text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ __('words.update') }}</button>
            </div>
        </form>
    </div>
@endsection
