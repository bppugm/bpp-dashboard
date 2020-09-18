@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col-md-3">
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
                    @foreach ($dashboards as $dashboard)
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('admin.dashboard.show', $dashboard) }}">
                                    <h4>{{ $dashboard->name }}</h4>
                                </a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection