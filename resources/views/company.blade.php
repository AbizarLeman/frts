@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if ($layout == 'show')

                <div class="card-header">Company</div>
                <div class="row">
                    <section class="col">
                        @include('companyprofile')
                    </section>
                </div>

                @elseif ($layout == 'create')
                
                <div class="card-header">Company Registration</div>
                @include('companyregistration')


                @elseif($layout == 'edit')

             
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
