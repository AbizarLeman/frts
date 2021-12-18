@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1 class="display-4">Issued Agricultural Output Reports</h1><br><br><br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Report Type</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)

                    <tr>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->report_type }}</td>
                        <td>{{ $report->created_at->format('Y-m-d') }}</td>
                        <td>{{ \App\User::where(['id' => $report->user_id])->pluck('name')->first() }}</td>
                        <td><a href="{{ url('/report/report-view/'.$report->id) }}"><i class="bi bi-eye-fill"></i></a></td>
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
    });
</script>
