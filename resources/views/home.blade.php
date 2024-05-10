@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role == 'admin')
                            {{ __('Hello Admin')}}
                        @else
                            {{ __('Hello') . ' '. Auth::user()->name }}
                            <?php
                                $employee = \App\Models\User::find(\Illuminate\Support\Facades\Auth::user()->id);
                                ?>
                        @if($employee->projects)
                            {{ __('you are in projects')}}
                            @foreach($employee->projects as $project)
                                <li>
                                    {{ $project->name }}
                                </li>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
