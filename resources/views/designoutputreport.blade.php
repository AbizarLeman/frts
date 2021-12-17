@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1 class="display-4">Agricultural Output Report</h1><br><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="output-type">Periodisation:</label>
            <select class="form-control" name="periodisation" id="periodisation">
                <option value="quarter">Annual Quarter</option>
                <option value="month">Monthly</option>
                <option value="none">None</option>
            </select>
        </div>
        <div class="col-4">
            <label for="output-type">Group by:</label>
            <select class="form-control" name="grouping" id="grouping">
                <option value="district">District</option>
                <option value="mukim">Mukim</option>
                <option value="village">Village</option>
                <option value="agricultural_development_area">Agricultural Development Area</option>
                <option value="company_id">Company</option>
            </select>
        </div>
        <div class="col-4" id="yearDiv">
            <label for="year">Year:</label>
            <select id="year" class="form-control" name="year">
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

    window.onload = function () {
        let years = document.getElementById("year");
        let currentYear = (new Date()).getFullYear();
 
        for (let i = 2010; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            years.appendChild(option);
        }
    };

    function buildTable() {
        $.ajax({
            type: "POST",
            url: '{{ url('/report/view/') }}',
            data:  {
                "_token": "{{ csrf_token() }}",
                "idArray": ({!! json_encode($response, JSON_HEX_TAG) !!}.original),
                "periodisation": $('#periodisation').val(),
                "grouping":  $('#grouping').val(),
                "start_date": "{{ $start_date }}",
                "end_date": "{{ $end_date }}",
                "year":  $('#year').val()
            },
            success: function(response) {
                console.log(response);
            }
        });
    }
</script>