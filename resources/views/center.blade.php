@extends('layouts.center-navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Centro de salud escritorio</div>

                <div class="card-body">
                   @component('components.who')
                   @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
