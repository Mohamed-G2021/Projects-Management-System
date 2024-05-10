@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('words.dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(Auth::user()->role == 'admin')
                            {{ __('words.hello_admin') }}
                        @else
                            {{ __('words.hello_user', ['name' => Auth::user()->name]) }}
                                <?php
                                $employee = \App\Models\User::find(\Illuminate\Support\Facades\Auth::user()->id);
                                ?>
                            @if($employee->projects)
                                {{ __('words.you_are_in_projects') }}
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
