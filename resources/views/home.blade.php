@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ $user->name }} - {{ $user->email }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>Your height: {{ $user->height }} cms.</div>
                    
                    <div>Your weight: {{ $user->weight }} kg.</div>
                    
                    <div>Your Body Mass Index is: <b>{{ $bmi }}</b></div>
                    
                    <div>Your category is: <b>{{ $category }}</b></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
