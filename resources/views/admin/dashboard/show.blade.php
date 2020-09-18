@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <dashboard-grid-layout update-url="{{ route('admin.dashboard.update', $dashboard) }}" :initial-widgets="{{ $dashboard->widgets }}" :achievements='@json($achievements)'></dashboard-grid-layout>
        </div>
    </div>
</div>
@endsection