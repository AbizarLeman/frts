@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Company</div>

                @if ($layout == 'show') 

                <div class="row">
                    <section class="col">
                        @include('companyprofile')
                    </section>
                </div>

                @elseif ($layout == 'create')

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
                            <div class="col-md-6">
                                <input type="checkbox" id="rice" name="rice" value="1">
                                <label for="rice">Rice</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="broiler" name="broiler" value="1">
                                <label for="broiler">Broiler</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="vegetable" name="vegetable" value="1">
                                <label for="vegetable">Vegetables</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="fruit" name="fruit" value="1">
                                <label for="fruit">Fruits</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="buffalo" name="buffalo" value="1">
                                <label for="buffalo">Buffaloes</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="cattle" name="cattle"  value="1">
                                <label for="cattle">Cattle</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="goat" name="goat" value="1">
                                <label for="goat">Goats</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="cut-flower" name="cut-flower" value="1">
                                <label for="cut-flower">Cut Flowers</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="egg" name="egg" value="1">
                                <label for="egg">Egg</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="ornamental-horticulture" name="ornamental-horticulture" value="1">
                                <label for="ornamental-horticulture">Ornamental Horticulture</label><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="checkbox" id="miscellaneous" name="miscellaneous" value="1">
                                <input type="string" id="miscellaneous-string" name="miscellaneous-string">
                                <label for="miscellaneous">Miscellaneous</label><br>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>

                @elseif ($layout == 'show')

                <div>Show Company</div>


                @elseif($layout == 'edit')

             
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
