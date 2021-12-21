@extends('front.layouts.master')
@section('title', $article->title)
@section('bg', $article->image)
@section('content')

      <div class="col-md-9 bg-light">
          {!!$article->content!!}
                <!--{!!$article->content!!} içerik içerisinde html tagları varsa
                 çift ünlemişaretleri arasında kullanılıyor -->
          <br /><br />
          <span class="text-danger">Okunma sayısı: <b>{{$article->hit}}</b></span>
      </div>

@include('front.widgets.categoryWidget')
@endsection
