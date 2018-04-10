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
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are logged in!
                </div>
            </div>
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
                      <label for="staticEmail" class="form-label">Journal articles indexed in Scopus</label>
                      <input type="number" class="form-control" name="article_scopus" value="{{ $data->article_scopus }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Proceedings indexed in Scopus</label>
                      <input type="number" class="form-control" name="proceeding_scopus" value="{{ $data->proceeding_scopus }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Journal articles indexed in WoS, EBSCO, Microsoft Academic, and Pubmed</label>
                      <input type="number" class="form-control" name="article_other" value="{{ $data->article_other }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Proceedings indexed in WoS, EBSCO, Microsoft Academic, and Pubmed</label>
                      <input type="number" class="form-control" name="proceeding_other" value="{{ $data->proceeding_other }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Citation on Scopus in {{ date('Y') }}</label>
                      <input type="number" class="form-control" name="citation_scopus" value="{{ $data->citation_scopus }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Total citation in Scopus</label>
                      <input type="number" class="form-control" name="citation_total" value="{{ $data->citation_total }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Books published</label>
                      <input type="number" class="form-control" name="book" value="{{ $data->book }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Copyrights registered</label>
                      <input type="number" class="form-control" name="copyright" value="{{ $data->copyright }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Verified Sinta accounts</label>
                      <input type="number" class="form-control" name="sinta_account" value="{{ $data->sinta_account }}">
                    </div>
                    <div class="form-group">
                      <label for="staticEmail" class="form-label">Total Sinta accounts</label>
                      <input type="number" class="form-control" name="total_staff" value="{{ $data->total_staff }}">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-success float-right" type="submit">Save changes</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
