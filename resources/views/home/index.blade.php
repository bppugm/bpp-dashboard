@extends('layouts.master')

@section('content')
  <div class="container-fluid">
    <div class="row pb-5 mb-5">
      <div class="col-12 py-2 d-flex align-items-center justify-content-center">
        <img src="{{ url('images/logos/signature-logo-ugm.svg') }}" width="75" class="mr-3">
        <h1 class="page-title text-primary display-4 font-weight-bold" style="font-size: 3rem;">
          UGM's 2018 Achievements Minute by Minute
        </h1>
      </div>
    </div>
    <achievement-base 
    :initial-achievements="{{ json_encode($data) }}"
    base-url="{{ url('/') }}"
    ></achievement-base>
  </div>
@endsection