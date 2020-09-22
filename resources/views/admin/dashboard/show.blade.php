@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.dashboard.index') }}">
                <i class="fa fa-angle-left"></i> Back to dashboards list
            </a>
        </div>
    </div>
    <dashboard-grid-layout update-url="{{ route('admin.dashboard.update', $dashboard) }}"
        :initial-widgets="{{ $dashboard->widgets ?: "[]" }}" :achievements='@json($achievements)'>
    </dashboard-grid-layout>
</div>
@endsection