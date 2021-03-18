@extends('layouts.master')

@section('content')
  <div class="container-fluid">
    <div class="row pb-5 mb-5 justify-content-center">
      <div class="col-12 col-md-8">
        @include('home.header')
      </div>
    </div>
    <achievement-base 
    :initial-achievements="{{ json_encode($data) }}"
    base-url="{{ url('/') }}"
    ></achievement-base>
  </div>
@endsection