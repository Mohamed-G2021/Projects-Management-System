@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <div class="card">
            <div class="card-header">{{ __('words.manage_projects') }}</div>
            <div class="card-body">
                <a href="{{ route('projects.create') }}" class="btn btn-primary">{{ __('words.add_project') }}</a>
                <br>
                <br>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
