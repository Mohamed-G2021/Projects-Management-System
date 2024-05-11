@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ __('words.assign_project_to', ['name' => $employee->name]) }}</h3>
        <form method="post" action="{{ route('employee-projects.store', $employee->id) }}">
            @csrf
            <label>{{ __('words.projects') }}</label>
            <select class="projects" name="projects[]" multiple="multiple" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">{{ __('words.assign_projects') }}</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.projects').select2();
        });
    </script>
@endpush
