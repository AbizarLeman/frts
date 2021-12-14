@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company</div>

                @if ($layout == 'show') 

                <div class="row">
                    <section class="col">
                        @include('companyprofile')
                    </section>
                </div>

                @elseif ($layout == 'create')

                @include('companyregistration')

                @elseif ($layout == 'show')

                <div>Show Company</div>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection
