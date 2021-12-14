@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agricultural Output</div>

                @if ($layout == 'create')

                <div class="card-body">
                    <form method="POST" action="{{ url('/company/store/') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="output-type" class="col-md-4 col-form-label text-md-right">Agricultural Output Type</label>

                            <div class="col-md-6">
                                <p>{{ $type }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="output-in-metric-ton" class="col-md-4 col-form-label text-md-right">Metric Ton</label>

                            <div class="col-md-6">
                                <input id="output-in-metric-ton" type="text" class="form-control" name="output-in-metric-ton" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">District</label>

                            <div class="col-md-6">
                                <input id="district" type="text" class="form-control" name="district" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mukim" class="col-md-4 col-form-label text-md-right">Mukim</label>

                            <div class="col-md-6">
                                <input id="mukim" type="text" class="form-control" name="mukim" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="village" class="col-md-4 col-form-label text-md-right">Village</label>

                            <div class="col-md-6">
                                <input id="village" type="text" class="form-control" name="village" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
