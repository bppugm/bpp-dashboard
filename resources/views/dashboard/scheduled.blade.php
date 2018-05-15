@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center py-2">
      <div class="col-md-3">
        @include('layouts.sidebar')
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Achivement data</div>
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
        <div class="card mt-3">
          <div class="card-header d-flex justify-content-between align-items-center">
            Failed updates
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#clearFailedUpdatesModal">
              Clear all
            </button>
          </div>
          {{-- CLEAR FAILED UPDATES MODAL --}}
          <div class="modal fade"  id="clearFailedUpdatesModal" tabindex="-1" role="dialog" aria-labelledby="clearFailedUpdatesModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Clear failed updates?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="deleteSubjectForm" action="{{ route('scheduled.clear') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    Once the list is cleared, it can't be undone.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn bg-white" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Clear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- END OF DELETE SUBJECT MODAL --}}
          <div class="card-body">
            {{-- <h5 class="card-title">Failed updates</h5> --}}
            @forelse ($jobs as $job)
              <div class="row">
                <div class="col">
                  <small class="text-muted"><i class="fa fa-clock"></i> {{ $job->formatted_date }}</small> <br>
                  <span>{{ substr($job->exception, 0, 200) }} .....</span>
                </div>
              </div>
              @if (!$loop->last)
                <hr>
              @endif
            @empty
              <div class="row">
                <div class="col text-center text-muted ">
                  <i class="far fa-check-circle fa-5x"></i>
                  <h3 class="my-3">Yeay! No failed updates were found</h3>
                </div>
              </div>
            @endforelse
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
