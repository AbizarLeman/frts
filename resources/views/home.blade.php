@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('/company') }}"><i class="bi bi-building" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">View Company Profile</h5>
                </div>
            </div>
        </div>
        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('/output') }}"><i class="bi bi-shop" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Submit Farm Output</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('/output/history') }}"><i class="bi bi-list-columns" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">View Farm Output History</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
