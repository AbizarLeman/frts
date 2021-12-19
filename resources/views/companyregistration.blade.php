<div class="card-body">
    <form method="POST" action="{{ url('/company/store/') }}">
        @csrf

        <div class="form-group row">
            <label for="company-name" class="col-md-4 col-form-label text-md-right">Company Name / Owner's Name</label>

            <div class="col-md-6">
                <input id="company-name" type="text" class="form-control" name="company-name" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="rocbn" class="col-md-4 col-form-label text-md-right">ROCBN</label>

            <div class="col-md-6">
                <input id="rocbn" type="text" class="form-control" name="rocbn" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="district" class="col-md-4 col-form-label text-md-right">District</label>

            <div class="col-md-6">
                <select id="district" class="form-control" name="district" onchange="getMukimDDL(this.value);" required autofocus>
                    @foreach (\App\District::all()->pluck('district') as $district)
                    <option value="{{ $district }}">{{ $district}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="mukim" class="col-md-4 col-form-label text-md-right">Mukim</label>

            <div class="col-md-6">
                <select id="mukim" class="form-control" name="mukim" onchange="getVillageDDL(this.value);" required autofocus>
                    @foreach (\App\Mukim::where(['district' => 'Brunei-Muara'])->pluck('mukim') as $mukim)
                    <option value="{{ $mukim }}">{{ $mukim }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="village" class="col-md-4 col-form-label text-md-right">Village</label>

            <div class="col-md-6">
                <select id="village" class="form-control" name="village" required autofocus>
                    @foreach (\App\Village::where(['mukim' => 'Berakas A'])->pluck('village') as $village)
                    <option value="{{ $village }}">{{ $village }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="street-address" class="col-md-4 col-form-label text-md-right">Street Address</label>

            <div class="col-md-6">
                <input id="street-address" type="text" class="form-control" name="street-address" required autofocus>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Agricultural Output Type</label>

            <div class="ml-5 col-md-6 form-check form-check">
                <input class="form-check-input" type="checkbox" id="rice" name="rice" value="1">
                <label class="ml-3 form-check-label text-md-right" for="rice">Rice</label><br>
                <input class="form-check-input" type="checkbox" id="broiler" name="broiler" value="1">
                <label class="ml-3 form-check-label" for="broiler">Broiler</label><br>
                <input class="form-check-input" type="checkbox" id="vegetable" name="vegetable" value="1">
                <label class="ml-3 form-check-label" for="vegetable">Vegetables</label><br>
                <input class="form-check-input" type="checkbox" id="fruit" name="fruit" value="1">
                <label class="ml-3 form-check-label" for="fruit">Fruits</label><br>
                <input class="form-check-input" type="checkbox" id="cattle" name="cattle"  value="1">
                <label class="ml-3 form-check-label" for="cattle">Cattle</label><br>
                <input class="form-check-input" type="checkbox" id="goat" name="goat" value="1">
                <label class="ml-3 form-check-label" for="goat">Goats</label><br>
                <input class="form-check-input" type="checkbox" id="egg" name="egg" value="1">
                <label class="ml-3 form-check-label" for="egg">Egg</label><br>
            </div>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    });
    function getMukimDDL(district) {
        $('#mukim').empty();
        $('#village').empty();
        $.ajax({
            type: "GET",
            async: false,
            url: '{{ url('/misc/mukim/') }}',
            data:  {
                "_token": "{{ csrf_token() }}",
                "district": JSON.stringify(district),
            },
            success: function(response) {
                response.forEach(mukim => {
                    $('#mukim').append( new Option(mukim,mukim) )
                });
                getVillageDDL($('#mukim').val());
            }
        });
    }
    function getVillageDDL(mukim) {
        $('#village').empty();
        $.ajax({
            type: "GET",
            async: false,
            url: '{{ url('/misc/village/') }}',
            data:  {
                "_token": "{{ csrf_token() }}",
                "mukim": JSON.stringify(mukim),
            },
            success: function(response) {
                response.forEach(village => {
                    $('#village').append( new Option(village,village) )
                });
            }
        });
    }
</script>