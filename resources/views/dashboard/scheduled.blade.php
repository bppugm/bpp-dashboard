@extends('layouts.app')

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
        @if ($errors->first('data.*'))
          <div class="alert alert-warning">
            Whoops, it looks like you have entered incorrect value. Please try again.
          </div>
        @endif
        <div class="card">
          <div class="card-header">Edit data</div>
          <div class="card-body">
            <form method="POST" action="{{ route('home.update') }}">
              @csrf
              @method('PUT')
              <div class="form-group border-bottom">
                <b>These fields below have implemented Scheduled Update. There's no need to update it manually.</b>
              </div>
              <div class="form-group">
                <label for="staticEmail" class="form-label">Journal articles indexed in Scopus</label>
                <input type="number" class="form-control" disabled value="{{ $data['article_scopus']->value }}">
                <small class="text-muted float-right"><i class="far fa-clock fa-fw"></i> {{ $data['article_scopus']->updated_at->format('j F Y h:i') }}</small>
              </div>
              <div class="form-group">
                <label for="staticEmail" class="form-label">Proceedings indexed in Scopus</label>
                <input type="number" class="form-control" disabled value="{{ $data['proceeding_scopus']->value }}">
                <small class="text-muted float-right"><i class="far fa-clock fa-fw"></i> {{ $data['proceeding_scopus']->updated_at->format('j F Y h:i') }}</small>
              </div>
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
