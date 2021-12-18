@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($company->rice == 1)

        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('output/create/'.'rice') }}"><i class="bi bi-building" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Rice</h1>
                </div>
            </div>
        </div>

        @endif
        @if ($company->broiler == 1)

        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('output/create/'.'broiler') }}"><i class="bi bi-shop" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Broiler</h1>
                </div>
            </div>
        </div>

        @endif
        @if ($company->vegetable == 1)

        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('output/create/'.'vegetables') }}"><i class="bi bi-list-columns" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Vegetables</h1>
                </div>
            </div>
        </div>

        @endif
        @if ($company->fruit == 1)

        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('output/create/'.'fruits') }}"><i class="bi bi-truck" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Fruits</h1>
                </div>
            </div>
        </div>

        @endif
        @if ($company->cattle == 1)
        
        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('output/create/'.'cattle') }}"><i class="bi bi-truck" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Cattle</h1>
                </div>
            </div>
        </div>
        
        @endif
        @if ($company->goat == 1)

        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('output/create/'.'goats') }}"><i class="bi bi-list-columns" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Goats</h1>
                </div>
            </div>
        </div>

        @endif
        @if ($company->egg == 1)

        <div class="col-10 my-2">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('output/create/'.'eggs') }}"><i class="bi bi-list-columns" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Eggs</h1>
                </div>
            </div>
        </div>

        @endif
    </div>
</div>
@endsection
