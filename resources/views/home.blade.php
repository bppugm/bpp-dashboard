@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
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
        </div>
      </div>
      <div class="row justify-content-center py-2">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Edit data</div>
            <div class="card-body">
              <form method="POST" action="{{ route('home.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Journal articles indexed in WoS, EBSCO, Microsoft Academic, and Pubmed</label>
                  <input type="number" class="form-control @if($errors->has('data.article_other')) is-invalid @endif" name="data[article_other]" value="{{ $data['article_other']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.article_other') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['article_other']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Proceedings indexed in WoS, EBSCO, Microsoft Academic, and Pubmed</label>
                  <input type="number" class="form-control @if($errors->has('data.proceeding_other')) is-invalid @endif" name="data[proceeding_other]" value="{{ $data['proceeding_other']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.proceeding_other') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['proceeding_other']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Citation in Scopus in {{ date('Y') }}</label>
                  <input type="number" class="form-control @if($errors->has('data.citation_scopus')) is-invalid @endif" name="data[citation_scopus]" value="{{ $data['citation_scopus']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.citation_scopus') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['citation_scopus']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Total citation in Scopus</label>
                  <input type="number" class="form-control @if($errors->has('data.total_citation')) is-invalid @endif" name="data[total_citation]" value="{{ $data['total_citation']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.total_citation') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['total_citation']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Books published</label>
                  <input type="number" class="form-control @if($errors->has('data.book')) is-invalid @endif" name="data[book]" value="{{ $data['book']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.book') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['book']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Copyrights registered</label>
                  <input type="number" class="form-control @if($errors->has('data.copyright')) is-invalid @endif" name="data[copyright]" value="{{ $data['copyright']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.copyright') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['copyright']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Verified Sinta accounts</label>
                  <input type="number" class="form-control @if($errors->has('data.sinta_account')) is-invalid @endif" name="data[sinta_account]" value="{{ $data['sinta_account']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.sinta_account') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['sinta_account']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Total Sinta accounts</label>
                  <input type="number" class="form-control @if($errors->has('data.total_staff')) is-invalid @endif" name="data[total_staff]" value="{{ $data['total_staff']->value }}">
                  <div class="d-flex justify-content-between mt-1">
                    <small class="text-danger">{{ $errors->first('data.total_staff') }}</small>
                    <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ $data['total_staff']->updated_at->format('j F Y h:i') }}</small>
                  </div>
                </div>
                <div class="form-group border-bottom mt-4">
                  <b>These fields below have implemented Scheduled Update. There's no need to update it manually.</b>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Journal articles indexed in Scopus</label>
                  <input type="number" class="form-control" disabled value="{{ $data['article_scopus']->value }}">
                  <small class="text-muted float-right"><i class="far fa-clock fa-fw"></i> {{ $data['citation_scopus']->updated_at->format('j F Y h:i') }}</small>
                </div>
                <div class="form-group">
                  <label for="staticEmail" class="form-label">Proceedings indexed in Scopus</label>
                  <input type="number" class="form-control" disabled value="{{ $data['proceeding_scopus']->value }}">
                  <small class="text-muted float-right"><i class="far fa-clock fa-fw"></i> {{ $data['citation_scopus']->updated_at->format('j F Y h:i') }}</small>
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
