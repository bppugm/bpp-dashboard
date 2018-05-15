@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center py-2">
      <div class="col-md-3">
        @include('layouts.sidebar')
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Achiement data</div>
          <div class="card-body">
            <form method="POST" action="{{ route('home.update') }}">
              @csrf
              @method('PUT')
              <div class="alert alert-info">
                These fields below have implemented Scheduled Update. However, it is possible to run update at anytime.
              </div>
              <div id="article_scopus" class="form-group">
                <label for="staticEmail" class="form-label">Journal articles indexed in Scopus</label>
                <input type="number" class="form-control" disabled value="{{ $data['article_scopus']->value }}">
                <small id="article_scopus_date" class="text-muted float-right"><i class="far fa-clock fa-fw"></i> {{ $data['article_scopus']->updated_at->format('j F Y h:i') }}</small>
                <div class="valid-feedback">
                  
                </div>
              </div>
              <div id="proceeding_scopus" class="form-group">
                <label for="staticEmail" class="form-label">Proceedings indexed in Scopus</label>
                <input type="number" class="form-control" disabled value="{{ $data['proceeding_scopus']->value }}">
                <small id="proceeding_scopus_date" class="text-muted float-right"><i class="far fa-clock fa-fw"></i> {{ $data['proceeding_scopus']->updated_at->format('j F Y h:i') }}</small>
                <div class="valid-feedback">
                  
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-success" type="button" onclick="checkUpdates()">Check for updates</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    var status = {};

    function updateField(data) {
      var field = $('#'+data.name)
      var input = field.find('input')
      var feedback = field.find('.valid-feedback')
      var date = field.find('small')

      input.addClass('is-valid')
      if (input.val() == data.value) {
        feedback.html('Data was already up to date');
      } else {
        feedback.html('Sucessfully updated');
        input.val(data.value)
        date.html('Updated just now')
      }
    }

    function restoreButton() {
      $(".btn-success").removeClass('disabled').html('Check for updates');
    }

    function catchErrors(error) {
      console.log(error);
      toastr.error(error.response.data.exception, 'Error '+error.response.status);
    }

    function setEndpoints() {
      return {
        article_scopus: '{{ url('scopus/article') }}',
        proceeding_scopus: '{{ url('scopus/proceeding') }}'
      }
    }

    function checkUpdates() {
      var promises = [];
      var endpoints = setEndpoints();

      $(".btn-success").addClass('disabled').html('Updating...');
      toastr.info('Please wait until it finished', 'Updating');

      $.each(endpoints, function(name, url) {
        promises.push(axios.post(url));
      });

      axios.all(promises)
      .then(function (responses) {
        $.each(responses, function (index, response) {
          updateField(response.data);
        });
        restoreButton()
        toastr.success('Update finished');
      })
      .catch(function (error) {
          catchErrors(error);
          restoreButton();
        });
    }
  </script>
@endsection
