@extends('front.layouts.master')
@section('title', 'İletişim')
@section('bg', 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/contact-bg.jpg')
@section('content')

<div class="col-md-8 bg-light">
  @if(session('success')) <!-- mesaj doğru biçimde veritabanına kaydedilmişse..-->
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

    <p>Bizimle iletişime geçebilirsiniz</p>
        <form method="post" action="{{route('contact.post')}}">
          @csrf
            <div class="form-floating">
                <input class="form-control" name="name" id="name" type="text" value="{{old('name')}}" placeholder="Ad Soyadınız..."  required/>
                <label for="name">Ad Soyad</label>
            </div>
            <div class="form-floating">
                <input class="form-control" name="email" id="email" type="email" value="{{old('email')}}" placeholder="EMail Adresiniz..." required/>
                <label for="email">Email Adresi</label>
            </div>
            <div class="form-floating">
                <select class="form-control" name="topic" id="topic">
                    <option @if(old('topic')=="Bilgi") selected @endif> Bilgi  </option>
                    <option @if(old('topic')=="Destek") selected @endif> Destek </option>
                    <option @if(old('topic')=="Genel") selected @endif> Genel  </option>
                </select>
                <label for="topic">Konu</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="message" id="message" placeholder="Mesajınız..." >{{old('message')}}</textarea>
                <label for="message">Mesajınız</label>
            </div>
            <br />
            <!-- Submit Button-->
            <button class="btn btn-primary" id="submitButton" type="submit">Gönder</button>

        </form><br />
    </div>

    <div class="col-md-4">
      <div class="card card-default">
          <div class="card-body">Panel Content</div>
          Adres: bal bla bld
      </div>

    </div>
@endsection
