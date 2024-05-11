@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('words.add_new_employee') }}</h1>

        <form method="post" action="{{ route('employees.store') }}">
            @csrf
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <label class="form-label">{{ __('words.name') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    @error('name')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <label for="exampleFormControlTextarea1" class="form-label">{{ __('words.email') }}</label>
                    <input class="form-control" name="email" value="{{ old('email') }}" id="exampleFormControlTextarea1" rows="3"></input>
                    @error('email')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <label class="form-label">{{ __('words.password') }}</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">{{ __('words.submit') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
