@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1 class="display-4">Agricultural Output Report</h1><br><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="output-type">Periodisation:</label>
            <select class="form-control" name="time-periodisation" id="">
                <option value="quarter">Annual Quarter</option>
                <option value="monthly">Monthly</option>
                <option value="none">Custom</option>
            </select>
        </div>
        <div class="col-6">
            <label for="output-type">Group by:</label>
            <select class="form-control" name="grouping" id="">
                <option value="district">District</option>
                <option value="mukim">Mukim</option>
                <option value="village">Village</option>
                <option value="ada">Agricultural Development Area</option>
                <option value="company">Company</option>
            </select>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="buildTable();">View Table</button>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // var outputIdArray = ({!! json_encode($response, JSON_HEX_TAG) !!}.original);
    });

    function buildTable() {
        $.ajax({
            type: "POST",
            url: '{{ url('/report/view/') }}',
            data:  {
                "_token": "{{ csrf_token() }}",
                "data": ({!! json_encode($response, JSON_HEX_TAG) !!}.original)
            },
            success: function(response) {
                console.log(response);
            }
        });
    }
</script>