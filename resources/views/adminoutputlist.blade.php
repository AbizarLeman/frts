@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        
                    @endforeach
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
