@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col-md-3">
            <dashboard-form class="mb-3" btn-class="btn btn-outline-primary btn-block" submit-url="{{ route('admin.dashboard.store') }}">
                Create a new Dashboard
            </dashboard-form>
            @include('layouts.sidebar')
        </div>
        <div class="col-md-9">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboards List</div>
                <div class="card-body">
                    <table class="table table-hover">
                        @foreach ($dashboards as $dashboard)
                        <div class="row py-3">
                            <div class="col-md-8">
                                <a href="{{ route('admin.dashboard.show', $dashboard) }}">
                                    <h4 class="m-0">{{ $dashboard->name }}</h4>
                                </a>
                            </div>
                            <div class="col-md-4 text-right">
                                <dashboard-is-active-form :is-active="{{ $dashboard->is_active }}" submit-url="{{ route('admin.dashboard.activate', $dashboard) }}"></dashboard-is-active-form>
                                <dashboard-form method="put" submit-url="{{ route('admin.dashboard.update', $dashboard) }}" :initial-dashboard='@json($dashboard)' class="d-inline-block text-left" btn-class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-alt"></i></dashboard-form>
                                <delete-component delete-url="{{ route('admin.dashboard.delete', $dashboard) }}" redirect-url="{{ route('admin.dashboard.index') }}" class="text-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </delete-component>
                            </div>
                        </div>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection