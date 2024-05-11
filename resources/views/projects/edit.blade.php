@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('words.edit_project') }}</h1>

        <form method="post" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="mb-3">
                    <label class="form-label">{{ __('words.name') }}</label>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control">
                    @error('name')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('words.description') }}</label>
                    <input type="text" name="description" value="{{ $project->description }}" class="form-control">
                    @error('description')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('words.deadline') }}</label>
                    <input type="date" name="deadline" value="{{ $project->deadline }}" class="form-control">
                    @error('deadline')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ __('words.update') }}</button>
            </div>
        </form>

    </div>
@endsection
