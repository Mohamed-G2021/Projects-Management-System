@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{$project->name}} details</h1>

        <div class="card" style="width: 18rem; ">
            <div class="card-body">
                <h5 class="card-title">Name: {{$project->name}}</h5>
                <h5 class="card-title">description: {{$project->description}}</h5>
                <a href="{{route('projects.edit',$project->id)}}" class="btn btn-primary">Edit</a>

                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                </form>
            </div>
        </div>
        <br>
        <a href="{{route('projects.index')}}" class="btn btn-primary">back to all projects</a>

    </div>
@endsection
