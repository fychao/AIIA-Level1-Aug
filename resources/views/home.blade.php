@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> Hi, {{$usr['name']}}, {{$usr['sn']}} ! </h1>
                    <img src="{{$usr['img']}}" width=200 />
                    You are logged in!
                    <h2> Shopping history </h2>
                    You do not shop yet!
                    <h2> Recommending Item</h2>
                    {{$pick[2]}}
                    <div class="container">
                    <img src="{{$pick[3]}}" width=200/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
