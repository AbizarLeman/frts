@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agricultural Output</div>

                @if ($layout == 'create')

                <div class="card-body">
                    <form method="POST" action="{{ url('/output/store/') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="output-type" class="col-md-4 col-form-label text-md-right">Agricultural Output Type</label>
                            
                            <div class="col-md-6">
                            @if ($type == 'rice') 
                                <p class="form-control">Rice</p>
                            @elseif ($type == 'broiler')
                                <p class="form-control">Broiler</p>
                            @elseif ($type == 'vegetables')
                                <p class="form-control">Vegetables</p>
                            @elseif ($type == 'fruits')
                                <p class="form-control">Fruits</p>
                            @elseif ($type == 'buffaloes')
                                <p class="form-control">Buffaloes</p>
                            @elseif ($type == 'cattle')
                                <p class="form-control">Cattle</p>
                            @elseif ($type == 'goats')
                                <p class="form-control">Goats</p>
                            @elseif ($type == 'cut-flowers')
                                <p class="form-control">Cut Flower</p>
                            @elseif ($type == 'eggs')
                                <p class="form-control">Eggs</p>
                            @elseif ($type == 'ornamental-horticulture')
                                <p class="form-control">Ornamental Horticulture</p>
                            @elseif ($type == 'miscellaneous')
                                <p class="form-control">Miscellaneous</p> 
                            @endif
                                <input id="output-type" type="text" value="{{ $type }}" name="output-type" hidden autofocus>
                            </div>
                        </div>
                        @if ($type == 'rice')

                        @include('addrice')
                            
                        @endif
                        <div class="form-group row">
                            <label for="output-in-kg" class="col-md-4 col-form-label text-md-right">Output in Kilogram</label>

                            <div class="col-md-6">
                                <input id="output-in-kg" type="number" step="any" class="form-control" name="output-in-kg" required autofocus>
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
                        <div class="form-group row">
                            <label for="agricultural-development-area" class="col-md-4 col-form-label text-md-right">Agricultural Development Area</label>

                            <div class="col-md-6">
                                <input id="agricultural-development-area" type="text" class="form-control" name="agricultural-development-area" autofocus>
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
