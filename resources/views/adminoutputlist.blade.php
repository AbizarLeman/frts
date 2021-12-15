@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-6">
                    <label for="output-type">Output Type:</label>
                    <select class="form-control" name="output-type" id="">
                        <option value="rice">Rice</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="start-date">Start Date:</label>
                    <input id="" type="date" class="form-control" name="start-date" autofocus>
                </div>
                <div class="col-3">
                    <label for="end-date">End Date:</label>
                    <input id="" type="date" class="form-control" name="end-date" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="district">District:</label>
                    <select class="form-control" name="district" id="">
                        <option value="Brunei-Muara">Brunei-Muara</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="mukim">Mukim:</label>
                    <select class="form-control" name="mukim" id="">
                        <option value="Gadong">Gadong</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="village">Village:</label>
                    <select class="form-control" name="village" id="">
                        <option value="Tungku">Tungku</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="agricultural-development-area">Agricultural Development Area:</label>
                    <select class="form-control" name="agricultural-development-area" id="">
                        <option value="Area 1">Area 1</option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-3">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                </div>
            </div>
            <br><br>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Agricultural Output Type</th>
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
        // $("p").click(function(){
        //     alert("The paragraph was clicked.");
        // });
    });
</script>
