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
                            @elseif ($type == 'cattle')
                                <p class="form-control">Cattle</p>
                            @elseif ($type == 'goats')
                                <p class="form-control">Goats</p>
                            @endif
                                <input id="output-type" type="text" value="{{ $type }}" name="output-type" hidden autofocus>
                            </div>
                        </div>
                        @if ($type == 'rice')

                        @include('addrice')

                        @elseif ($type == 'broiler')

                        @elseif ($type == 'vegetables')

                        @include('addvegetable')

                        @elseif ($type == 'fruits')

                        @elseif ($type == 'cattle')

                        @elseif ($type == 'goats')
   
                        @endif
                        <div class="form-group row">
                            <label for="output-in-kg" class="col-md-4 col-form-label text-md-right">Total Output in Kilogram</label>

                            <div class="col-md-6">
                                <input id="output-in-kg" type="number" step="any" class="form-control" name="output-in-kg" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">District</label>

                            <div class="col-md-6">
                                <select id="district" class="form-control" name="district" onchange="getMukimDDL(this.value);" required autofocus>
                                    @foreach (\App\District::all()->pluck('district') as $district)
                                    <option value="{{ $district }}">{{ $district}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mukim" class="col-md-4 col-form-label text-md-right">Mukim</label>

                            <div class="col-md-6">
                                <select id="mukim" class="form-control" name="mukim" onchange="getVillageDDL(this.value);" required autofocus>
                                    @foreach (\App\Mukim::where(['district' => 'Brunei-Muara'])->pluck('mukim') as $mukim)
                                    <option value="{{ $mukim }}">{{ $mukim }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="village" class="col-md-4 col-form-label text-md-right">Village</label>

                            <div class="col-md-6">
                                <select id="village" class="form-control" name="village" required autofocus>
                                    @foreach (\App\Village::where(['mukim' => 'Berakas A'])->pluck('village') as $village)
                                    <option value="{{ $village }}">{{ $village }}</option>
                                    @endforeach
                                </select>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    });
    function getMukimDDL(district) {
        $('#mukim').empty();
        $('#village').empty();
        $.ajax({
            type: "GET",
            async: false,
            url: '{{ url('/misc/mukim/') }}',
            data:  {
                "_token": "{{ csrf_token() }}",
                "district": JSON.stringify(district),
            },
            success: function(response) {
                response.forEach(mukim => {
                    $('#mukim').append( new Option(mukim,mukim) )
                });
            }
        });
    }
    function getVillageDDL(mukim) {
        $('#village').empty();
        $.ajax({
            type: "GET",
            async: false,
            url: '{{ url('/misc/village/') }}',
            data:  {
                "_token": "{{ csrf_token() }}",
                "mukim": JSON.stringify(mukim),
            },
            success: function(response) {
                response.forEach(village => {
                    $('#village').append( new Option(village,village) )
                });
            }
        });
    }
</script>
@endsection
