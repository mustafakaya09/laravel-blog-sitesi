@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')

  <div class="col-md-9 bg-light">
    @include('front.widgets.articleListWidget')
  </div>

@include('front.widgets.categoryWidget')
@endsection
