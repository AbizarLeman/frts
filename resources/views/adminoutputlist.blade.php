@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1 class="display-4">Generete Agricultural Output Report</h1><br><br><br>
        </div>
        <div class="col">
            {!! Form::open(['action' => 'ReportController@getFilteredList', 'method' => 'GET']) !!}
            <div class="d-flex flex-row-reverse">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" id="quarter" checked onclick="evaluateToggleRangeOrQuarter();">Annual Quarters
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" id="range" onclick="evaluateToggleRangeOrQuarter();">Custom Date Range
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <label for="output-type">Output Type:</label>
                    <select class="form-control" name="output-type" id="">
                        <option value="rice">Rice</option>
                    </select>
                </div>
                <div class="col-3" id="startDateDiv">
                    <label for="start-date">Start Date:</label>
                    <input id="startDate" type="date" class="form-control" name="start-date" autofocus>
                </div>
                <div class="col-3" id="endDateDiv">
                    <label for="end-date">End Date:</label>
                    <input id="endDate" type="date" class="form-control" name="end-date" autofocus>
                </div>
                <div class="col-3" id="yearDiv">
                    <label for="year">Year:</label>
                    <select id="year" class="form-control" name="year" onchange="onAnnualQuarterChange();">
                        <option value="">Select the year</option>
                    </select>
                </div>
                <div class="col-3" id="quarterDiv">
                    <label for="annual-quarter">Quarter of the Year:</label>
                    <select id="annualQuarter" class="form-control" name="annual-quarter" onchange="onAnnualQuarterChange();">
                        <option value="">Select quarter of the year</option>
                        <option value="q1">Q1</option>
                        <option value="q2">Q2</option>
                        <option value="q3">Q3</option>
                        <option value="q4">Q4</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="district">District:</label>
                    <select class="form-control" name="district" id="">
                        <option value="Brunei-Muara">Brunei-Muara</option>
                        <option value="Tutong">Tutong</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="mukim">Mukim:</label>
                    <select class="form-control" name="mukim" id="">
                        <option value="Gadong">Gadong</option>
                        <option value="Pekan Tutong">Pekan Tutong</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="village">Village:</label>
                    <select class="form-control" name="village" id="">
                        <option value="Tungku">Tungku</option>
                        <option value="Bukit Bendera">Bukit Bendera</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="agricultural-development-area">Agricultural Development Area:</label>
                    <select class="form-control" name="agricultural-development-area" id="">
                        <option value="Area 1">Area 1</option>
                        <option value="Area 6">Area 6</option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-3">
                    {{ Form::Submit('submit', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
            <br><br>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Agricultural Output Type</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Harvesting/Packaging Date</th>
                        <th scope="col">Output in Kilogram</th>
                        <th scope="col">District</th>
                        <th scope="col">Mukim</th>
                        <th scope="col">Village</th>
                        <th scope="col">Agricultural Development Area</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outputs as $output)

                    <tr>
                        <td>{{ $output->output_type }}</td>
                        <td>{{ \App\Company::where(['id' => $output->company_id])->pluck('company_name')->first() }}</td>
                        <td>{{ $output->packaged_at }}</td>
                        <td>{{ $output->output_in_kg }}</td>
                        <td>{{ $output->district }}</td>
                        <td>{{ $output->mukim }}</td>
                        <td>{{ $output->village }}</td>
                        <td>{{ $output->agricultural_development_area }}</td>
                        <td>
                            <input type="checkbox" id="miscellaneous" name="miscellaneous" value="{{ $output->id }}">
                        </td>
                    </tr>

                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        let years = document.getElementById("year");
        let currentYear = (new Date()).getFullYear();
 
        for (let i = 2010; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            years.appendChild(option);
        }

        evaluateToggleRangeOrQuarter();
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
    function evaluateToggleRangeOrQuarter() {
        if (document.getElementById('quarter').checked == true && document.getElementById('range').checked == false) {
            document.getElementById('startDateDiv').hidden = true;
            document.getElementById('endDateDiv').hidden = true;
            document.getElementById('yearDiv').hidden = false;
            document.getElementById('quarterDiv').hidden = false;
        }
        if (document.getElementById('quarter').checked == false && document.getElementById('range').checked == true) {
            document.getElementById('startDateDiv').hidden = false;
            document.getElementById('endDateDiv').hidden = false;
            document.getElementById('yearDiv').hidden = true;
            document.getElementById('quarterDiv').hidden = true;
        }
    }
    function onAnnualQuarterChange() {
        let year = document.getElementById('year').value;

        if (year) {
            let annualQuarterValue = document.getElementById('annualQuarter').value;
            let startDate = document.getElementById('startDate');
            let endDate = document.getElementById('endDate');

            if (annualQuarterValue === 'q1') {
            startDate.value = year + '-01-01';
            endDate.value = year + '-03-31';
            } else if (annualQuarterValue === 'q2') {
                startDate.value = year + '-04-01';
                endDate.value = year + '-06-30'
            } else if (annualQuarterValue === 'q3') {
                startDate.value = year + '-07-01';
                endDate.value = year + '-09-30'
            } else if (annualQuarterValue === 'q4') {
                startDate.value = year + '-10-01';
                endDate.value = year + '-12-31'
            } else {
                startDate.value = '';
                endDate.value = '';
            }
        } else {
            startDate.value = '';
            endDate.value = '';
        }
    }
</script>
