@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card col-md-8 bodycontent">
                        <div class="card-body container">
                            <center>
                                <h2>Full Matches</h2>
                                <p class="bold">You have every floss required for these projects</p>
                            </center>
                            <div class="row mt-5">
                                @forelse($fullprojects as $project)
                                    <div class="card" style="max-width: 18rem;">
                                        <img class="card-img-top" src="/storage/projects/{{$project->image}}" alt="{{ $project->name }}">
                                        <div class="card-body">
                                            <center>
                                                <h5 class="card-title">{{ $project->name }}</h5>
                                                <p class="card-text">{{$project->artist}}</p>
                                                <a href="{{$project->source}}" class="actionbutton" target="_blank">BUY PATTERN</a>
                                            </center>
                                        </div>
                                    </div>
                                @empty
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8 mt-5">
                                                <center>
                                                    We're really sorry but we do not have any projects in our stash matching your floss inventory at this time.
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <hr/>
                            <center>
                                <h2>Partial Matches</h2>
                                <p class="bold">You have over 90% of the floss for these projects</p>
                            </center>
                            <div class="row">
                                @forelse($nearlyprojects as $project)
                                    <div class="card" style="max-width: 18rem;">
                                        <img class="card-img-top" src="/storage/projects/{{$project->image}}" alt="{{ $project->name }}">
                                        <div class="card-body justify-content-center">
                                            <center>
                                                <h5 class="card-title">{{ $project->name }}</h5>
                                                <p class="card-text">{{$project->artist}}</p>
                                                <a href="{{$project->source}}" class="actionbutton" target="_blank">BUY PATTERN</a>
                                            </center>
                                        </div>
                                    </div>
                                @empty
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 mt-5">
                                            <center>
                                                We're really sorry but we do not have any projects in our stash matching your floss inventory at this time.
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection
