@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{$employee->name}} details</h1>

        <div class="card" style="width: 18rem; ">
            <div class="card-body">
                <h5 class="card-title">Name: {{$employee->name}}</h5>
                <h5 class="card-title">email: {{$employee->email}}</h5>
                <h5 class="card-title">projects: </h5>
                @if($employee->projects)
                    @foreach($employee->projects as $project)
                        <li class="card-title">{{$project->name}}</li>
                    @endforeach
                @endif
                <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                </form>
            </div>
        </div>
        <br>
        <a href="{{route('employees.index')}}" class="btn btn-primary">back to all employees</a>

    </div>
@endsection
