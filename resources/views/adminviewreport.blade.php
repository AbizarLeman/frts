@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1 class="display-4">{{ $report->title }}</h1><br><br><br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <label for="" class="lead">Report Type:</label>
                    <p>{{ $report->report_type }}</p>
                </div>
                <div class="col-4">
                    <label for="" class="lead">Created At:</label>
                    <p>{{ $report->created_at->format('d M Y') }}</p>
                </div>
                <div class="col-4">
                    <label for="" class="lead">Created By:</label>
                    <p>{{ \App\User::where(['id' => $report->user_id])->pluck('name')->first() }}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <label for="" class="lead">Description:</label>
                    <p>{{ $report->description }}</p>
                </div>
            </div>
            <br><br>
            {{-- <div class="row justify-content-center">
                <div class="col-3">
                    <button class="btn btn-primary btn-lg btn-block" onclick="buildTable();">View Table</button>
                </div>
            </div> --}}
            <br><br><br>
            <div id="printableArea" class="row">
                <table id="reportTable" class="table table-bordered table-hover" style="@media print {table, th, td {border: 1px solid black;}}">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="7" class="text-center" id="tableHeader"></th>
                        </tr>
                        <tr id="tableHeaderColumn">
                        </tr>
                    </thead>
                    <tbody class="table-striped" id="tableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-3">
            <button class="btn btn-primary btn-lg btn-block" onclick="printTable('printableArea');">Print Table</button>
        </div>
    </div>
    <br><br><br>
    <input id="periodisation" value="{{ $report->periodisation }}" hidden>
    <input id="grouping" value="{{ $report->grouping }}" hidden>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        buildTable();
    });
    function buildTable() {
        let idArray = ({!! $report->company_id_array !!}.original);
        $('#tableBody').next('p').remove();
        $('#reportTable').hide();
        $('#printButton').hide();
        $.ajax({
            type: "POST",
            async: false,
            url: '{{ url('/report/view/') }}',
            data:  {
                "_token": "{{ csrf_token() }}",
                "idArray": idArray,
                "periodisation": $('#periodisation').val(),
                "grouping":  $('#grouping').val(),
                "start_date": "{{ $report->start_date }}",
                "end_date": "{{ $report->end_date }}",
                "year":  "{{ $report->year }}"
            },
            success: function(response) {
                console.log(response);
                $('#tableBody').empty();
                //Set Header Text
                let headingText = "";
                let startDate = "{{ $report->start_date }}";
                let endDate = "{{ $report->end_date }}";

                if(startDate == "" || endDate == ""){
                    headingText = 'Agricultural Output Report for ' + $('#year').val() + ' in Kilograms';
                } else {
                    headingText = 'Agricultural Output Report for ' + startDate + ' to ' + endDate + ' in Kilograms';
                }
                $("#tableHeader").text(headingText);

                    //Populate the Body Column
                    let bodyContent = "";
                    let areaArray = response.groups;
                    let countArea = 1;

                    areaArray.forEach((areaRow) => {
                        let rowContent = "";

                        let countOutputType = 1;
                        response.outputList.forEach((outputTypeRow) => {

                            //Check it is the first row of the area grouping and the output type grouping
                            if (countArea === 1 && countOutputType === 1) {
                                //rowspan should record lenth for each group
                                rowContent = "<tr><td rowspan=\x22" + response.outputList.length + "\x22>" + areaRow + "</td>" + "<td>" + outputTypeRow + "</td>";
                                countArea++;
                                countOutputType++;
                            } else if (countArea !== 1 && countOutputType !== 1) {
                                rowContent = "<tr><td>" + outputTypeRow + "</td>";
                                countOutputType++;
                            } else {
                                rowContent = "<td>" + outputTypeRow + "</td>";
                                countOutputType++;
                            }

                            if($('#periodisation').val() == "quarter"){
                                //Set Number of Column
                                $("#tableHeader").attr('colspan', 7);
                                $("#tableHeaderColumn").html("<th>Area</th><th>Main Crops Production</th><th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th><th>Total</th>");

                                let total = 0;

                                if (!jQuery.isEmptyObject(response["q1"]) && response["q1"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["q1"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["q1"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["q2"]) && response["q2"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["q2"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["q2"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["q3"]) && response["q3"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["q3"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["q3"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["q4"]) && response["q4"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["q4"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["q4"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                
                                rowContent = rowContent + "<td>" + total.toFixed(2) + "</td></tr>";
                                bodyContent = bodyContent + rowContent
                            } else if($('#periodisation').val() == "month") {
                                $("#tableHeader").attr('colspan', 15);
                                $("#tableHeaderColumn").html("<th>Area</th><th>Main Crops Production</th><th>January</th><th>February</th><th>March</th><th>April</th><th>May</th><th>June</th><th>July</th><th>August</th><th>September</th><th>October</th><th>November</th><th>December</th><th>Total</th>");

                                let total = 0;

                                if (!jQuery.isEmptyObject(response["January"]) && response["January"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["January"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["January"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["February"]) && response["February"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["February"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["February"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["March"]) && response["March"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["March"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["March"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["April"]) && response["April"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["April"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["April"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["May"]) && response["May"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["May"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["May"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["June"]) && response["June"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["June"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["June"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["July"]) && response["July"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["July"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["July"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["August"]) && response["August"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["August"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["August"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["September"]) && response["September"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["September"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["September"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["October"]) && response["October"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["October"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["October"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["November"]) && response["November"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["November"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["November"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                if (!jQuery.isEmptyObject(response["December"]) && response["December"][areaRow].hasOwnProperty(outputTypeRow)) {
                                    rowContent = rowContent + "<td>" + response["December"][areaRow][outputTypeRow].toFixed(2) + "</td>";
                                    total = total + response["December"][areaRow][outputTypeRow];
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                rowContent = rowContent + "<td>" + total.toFixed(2) + "</td></tr>";
                                bodyContent = bodyContent + rowContent
                            } else {
                                $("#tableHeader").attr('colspan', 3);
                                $("#tableHeaderColumn").html("<th>Area</th><th>Main Crops Production Total</th><th>Total</th>");
                                console.log(response);

                                if (response.groupTotal[areaRow][outputTypeRow]) {
                                    rowContent = rowContent + "<td>" + response.groupTotal[areaRow][outputTypeRow].toFixed(2) + "</td>";
                                } else {
                                    rowContent = rowContent + "<td>0.00</td>";
                                }
                                rowContent = rowContent + "</tr>";
                                bodyContent = bodyContent + rowContent
                            }
                    });
                    countArea = 1;
                });
                $('#tableBody').html(bodyContent);
                $('#reportForm').show();
                $('#reportTable').show();
                $('#printButton').show();
            }
        });
    }
    function printTable(divName) {
        let printContents = document.getElementById(divName).innerHTML;
        let originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
