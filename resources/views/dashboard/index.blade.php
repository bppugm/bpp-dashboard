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
          <div class="card-header">Achievement data</div>
          <div class="card-body">
            <form method="POST" action="{{ route('home.update') }}">
              @csrf
              @method('PUT')
              @foreach ($achievements as $achievement)
                <div class="form-group">
                  <label for="staticEmail" class="form-label">{{ $achievement->name }}</label>
                  <input type="number" class="form-control" name="data[{{ $achievement->name }}]" value="{{ $achievement->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $achievement->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
              @endforeach
              <div class="form-group">
                <button class="btn btn-success" type="submit">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
