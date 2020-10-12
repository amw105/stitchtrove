@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="page-header">
        <h2>Project Collection</h2>
        <p class="bold">All these projects are included in the inventory search</p>
    </div>
    <div class="card-columns">
        @foreach ($projects as $project)
            <div class="card mb-4 mx-1">
                <img class="card-img-top" src="/storage/projects/{{$project->image}}" alt="{{ $project->name }}">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{$project->artist}}</p>
                        <a href="{{$project->source}}" class="actionbutton" target="_blank">BUY PATTERN</a>
                    </center>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
