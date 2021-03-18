@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <div class="row pb-5 justify-content-center">
        <div class="col-12 col-md-8">
            @include('home.header')
        </div>
    </div>
    <dashboard-base :dashboard-id="{{ $dashboard->id }}" :initial-achievements="{{ json_encode($achievements) }}" :widgets="{{ $dashboard->widgets }}"></dashboard-base>
</div>
@endsection