@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5 m-4">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('/report/index') }}"><i class="bi bi-building" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">View Submitted Agricultural Outputs</h5>
                </div>
            </div>
        </div>
        <div class="col-5 m-4">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href="{{ url('/report/report-index') }}"><i class="bi bi-shop" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">View Saved Agricultural Output Reports</h5>
                </div>
            </div>
        </div>
        <div class="col-5 m-4">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href=""><i class="bi bi-list-columns" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">View Agricultural Aid Scheme</h5>
                </div>
            </div>
        </div>
        <div class="col-5 m-4">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <a href=""><i class="bi bi-truck" style="font-size:10em;"></i></a>
                    <h1 class="card-title text-center">Pending Company Verification</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
