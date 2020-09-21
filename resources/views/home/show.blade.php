@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <div class="row pb-5 justify-content-center">
        <div class="col-12 col-md-7 py-2">
            <img src="{{ url('images/logos/logo-text-ugm.svg?v=2') }}" class="img-fluid">
        </div>
    </div>
    <dashboard-base :dashboard-id="{{ $dashboard->id }}" :initial-achievements="{{ json_encode($achievements) }}" :widgets="{{ $dashboard->widgets }}"></dashboard-base>
</div>
@endsection