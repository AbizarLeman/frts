<div class="container">
    <br><br>
    <div class="row">
        <h5 class="col-md-4 text-md-right">Company Name / Owner's Name:</h5>
    
        <div class="col-md-6">
            <p>{{ $company->company_name }}</p>
        </div>
    </div>
    <div class="row">
        <h5 class="col-md-4 text-md-right">ROCBN:</h5>
    
        <div class="col-md-6">
            <p>{{ $company->rocbn }}</p>
        </div>
    </div>
    <div class="row">
        <h5 class="col-md-4 text-md-right">District:</h5>
    
        <div class="col-md-6">
            <p>{{ $company->district }}</p>
        </div>
    </div>
    <div class="row">
        <h5 class="col-md-4 text-md-right">Mukim:</h5>
    
        <div class="col-md-6">
            <p>{{ $company->mukim }}</p>
        </div>
    </div>
    <div class="row">
        <h5 class="col-md-4 text-md-right">Village:</h5>
    
        <div class="col-md-6">
            <p>{{ $company->village }}</p>
        </div>
    </div>
    <div class="row">
        <h5 class="col-md-4 text-md-right">Street Address:</h5>
    
        <div class="col-md-6">
            <p>{{ $company->street_address }}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <h5 class="col-md-4 text-md-right">Agricultural Output Type:</h5>
    
        <div class="col-md-6">
            @if ($company->rice)
            <p>Rice</p>
            @endif
            @if ($company->broiler)
            <p>Broiler</p>
            @endif
            @if ($company->vegetable)
            <p>Vegetables</p>
            @endif
            @if ($company->fruit)
            <p>Fruits</p>
            @endif
            @if ($company->cattle)
            <p>Cattle</p>
            @endif
            @if ($company->goat)
            <p>Goats</p>
            @endif
            @if ($company->egg)
            <p>Eggs</p>
            @endif
        </div>
    </div>
    <br><br>
</div>