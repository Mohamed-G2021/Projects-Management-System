@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Assign project to {{$employee->name}}</h3>
        <form method="post" action="{{route('employee-projects.store', $employee->id)}}" for>
            @csrf
             <label>Projects</label>
            <select class="projects" name="projects[]" multiple="multiple" required>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Assign projects</button>
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
