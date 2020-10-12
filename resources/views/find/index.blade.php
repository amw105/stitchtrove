@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h2>Find new projects based on your floss inventory</h2>
        <p class="bold">Simply enter a comma seperated list of your DMC threads..</p>
    </div>

                    <div class="card col-md-8">
                        <div class="card-body">
                            <form method="POST" action="/compare-patterns">
                                @csrf
                                <label for="floss">Enter a comma seperated list of your threads</label>
                                <br/><br/>
                                <textarea id="floss" name="floss" class="@error('floss') is-invalid @enderror"></textarea>
                                <br/><br/>
                                <button type="submit" id="compare-btn" class="btn btn-generic">Find Patterns</button>
                                @error('floss')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </form>
                        </div>
                    </div>
</div>
@endsection
