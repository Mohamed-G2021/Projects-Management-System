@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{ $project->name }} {{ __('words.details') }}</h1>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ __('words.name') }}: {{ $project->name }}</h5>
                <h5 class="card-title">{{ __('words.description') }}: {{ $project->description }}</h5>
                <h5 class="card-title">{{ __('words.employees') }}:</h5>
                @if($project->employees)
                    @foreach($project->employees as $employee)
                        <li>
                            {{ $employee->name }}
                        </li>
                    @endforeach
                @endif

                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">{{ __('words.edit') }}</a>

                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('words.confirm_delete_project') }}')">{{ __('words.delete') }}</button>
                </form>
            </div>
        </div>
        <br>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">{{ __('words.back_to_all_projects') }}</a>

    </div>
@endsection
