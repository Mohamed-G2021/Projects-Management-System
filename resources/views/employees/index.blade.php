@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

            <div class="card">
            <div class="card-header">Manage Employees</div>
            <div class="card-body">
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
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
