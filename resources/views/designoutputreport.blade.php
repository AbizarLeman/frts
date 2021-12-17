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
    <div class="row justify-content-center">
        <div id="printableArea" class="col-12">
            <br><br>
            <table id="reportTable" class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="7" class="text-center">2005 or Date range</th>
                    </tr>
                    <tr>
                        <th>Area</th>
                        <th>Main Crops Production</th>
                        <th>Q1</th>
                        <th>Q2</th>
                        <th>Q3</th>
                        <th>Q4</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    <tr>
                        <td rowspan="3">Tungku</td>
                        <td>Rice</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td>Vegetables</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td>Eggs</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td rowspan="3">Beribi</td>
                        <td>Rice</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td>Vegetables</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td>Eggs</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td rowspan="3">Kiarong</td>
                        <td>Rice</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td>Vegetables</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                    <tr>
                        <td>Eggs</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                        <td>2323</td>
                    </tr>
                </tbody>
            </table>
            <br><br>      
        </div>
        <div class="col-3">
            <button id="printButton" type="submit" class="btn btn-primary btn-lg btn-block" onclick="printDiv('printableArea');">Print Table</button>
        </div>
    </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#reportTable').hide();
        $('#printButton').hide();
    });

    window.onload = function () {
        let years = document.getElementById("year");
        let currentYear = (new Date()).getFullYear();
 
        for (let i = currentYear; i >= currentYear-10; i--) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            years.appendChild(option);
        }
    };

    function buildTable() {
        $('#reportTable').hide();
        $('#printButton').hide();
        $.ajax({
            type: "POST",
            async: false,
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
                $('#reportTable').show();
                $('#printButton').show();
            }
        });
    }

    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>