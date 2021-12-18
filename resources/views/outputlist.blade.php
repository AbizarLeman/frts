@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1 class="display-4">My Farm Output</h1><br><br><br>
        </div>
        @foreach ($outputs as $output)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Agricultural Output Type</h5>
              <p class="card-text">{{ \App\OutputType::where(['output_type' => $output->output_type])->pluck('output_type_string')->first() }}</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Harvesting/Packaging Date</h5>
                <p class="card-text">{{ $output->packaged_at }}</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Output in Kilogram</h5>
                <p class="card-text">{{ $output->output_in_kg }}</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">District</h5>
                <p class="card-text">{{ $output->district }}</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Mukim</h5>
                <p class="card-text">{{ $output->mukim }}</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Mukim</h5>
                <p class="card-text">{{ $output->village }}</p>
            </div>
        </div>
        @endforeach  
    </div>
</div>
@endsection