@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{ __('words.employee_details') }} {{ $employee->name }}</h1>

        <div class="card" style="width: 18rem; ">
            <div class="card-body">
                <h5 class="card-title">{{ __('words.name') }}: {{ $employee->name }}</h5>
                <h5 class="card-title">{{ __('words.email') }}: {{ $employee->email }}</h5>
                <h5 class="card-title">{{ __('words.projects') }}:</h5>
                @if($employee->projects)
                    @foreach($employee->projects as $project)
                        <li class="card-title">{{ $project->name }}</li>
                    @endforeach
                @endif
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">{{ __('words.edit') }}</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('words.confirm_delete_employee') }}')">{{ __('words.delete') }}</button>
                </form>
            </div>
        </div>
        <br>
        <a href="{{ route('employees.index') }}" class="btn btn-primary">{{ __('words.back_to_all_employees') }}</a>

    </div>
@endsection
