<div class="card-body">
    <form method="POST" action="{{ url('/company/store/') }}">
        @csrf

        <div class="form-group row">
            <label for="company-name" class="col-md-4 col-form-label text-md-right">Company Name</label>

            <div class="col-md-6">
                <input id="company-name" type="text" class="form-control" name="company-name" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="rocbn" class="col-md-4 col-form-label text-md-right">ROCBN</label>

            <div class="col-md-6">
                <input id="rocbn" type="text" class="form-control" name="rocbn" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="district" class="col-md-4 col-form-label text-md-right">District</label>

            <div class="col-md-6">
                <input id="district" type="text" class="form-control" name="district" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="mukim" class="col-md-4 col-form-label text-md-right">Mukim</label>

            <div class="col-md-6">
                <input id="mukim" type="text" class="form-control" name="mukim" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="village" class="col-md-4 col-form-label text-md-right">Village</label>

            <div class="col-md-6">
                <input id="village" type="text" class="form-control" name="village" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="street-address" class="col-md-4 col-form-label text-md-right">Street Address</label>

            <div class="col-md-6">
                <input id="street-address" type="text" class="form-control" name="street-address" required autofocus>
            </div>
        </div>
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
                <input class="form-check-input" type="checkbox" id="buffalo" name="buffalo" value="1">
                <label class="ml-3 form-check-label" for="buffalo">Buffaloes</label><br>
                <input class="form-check-input" type="checkbox" id="cattle" name="cattle"  value="1">
                <label class="ml-3 form-check-label" for="cattle">Cattle</label><br>
                <input class="form-check-input" type="checkbox" id="goat" name="goat" value="1">
                <label class="ml-3 form-check-label" for="goat">Goats</label><br>
                <input class="form-check-input" type="checkbox" id="cut-flower" name="cut-flower" value="1">
                <label class="ml-3 form-check-label" for="cut-flower">Cut Flowers</label><br>
                <input class="form-check-input" type="checkbox" id="egg" name="egg" value="1">
                <label class="ml-3 form-check-label" for="egg">Egg</label><br>
                <input class="form-check-input" type="checkbox" id="ornamental-horticulture" name="ornamental-horticulture" value="1">
                <label class="ml-3 form-check-label" for="ornamental-horticulture">Ornamental Horticulture</label><br>
                <input class="form-check-input" type="checkbox" id="miscellaneous" name="miscellaneous" value="1">
                <input class="ml-3" type="string" id="miscellaneous-string" name="miscellaneous-string" placeholder="Miscellaneous">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
    </form>
</div>