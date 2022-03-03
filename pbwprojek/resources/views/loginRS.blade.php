@extends('layout.main')

@section('title', 'Gudang Darah | Login')

@section('home')
<a class="navbar-brand nav1 ms-3" href="">
  <h3>GUDANG DARAH</h3>
</a>
@endsection

@section ('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ms-auto">
    <li class="nav-item">
      <a class="nav-link ps" href="aboutUs">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link ps" href="{{ route('registerRS') }}">Daftar</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link ps" href="{{ route('loginRS') }}">Login</a>
    </li>
  </ul>
</div>
@endsection

@section('container')
<!-- Form Login Rumah Sakit-->
<div class="d-flex row justify-content-center">
  <div class="col-md-6 col-lg-3">
    <div class="login-wrap margin2">
      <div class="bg-primary">
        <ul class="nav nav-tabs" id="" role="tablist">
          <li class="nav-item w-50">
            <a class="nav-link  text-dark bg-primary " data-toggle="" href="" aria-expanded="true">Rumah Sakit</a>
          </li>
          <li class="nav-item w-50 text-md-right">
            <a class="nav-link text-white bg-primary" id="" data-toggle="" href="{{ route('loginUser') }}" aria-expanded="false">Penerima</a>
          </li>
        </ul>
      </div>
      <form action="{{ route('loginRS') }}" class="signin-form shadow p-3 mb-5 bg-white rounded" method="post">
        @csrf
        <div class="form-group">
          @if(session('errors'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Something it's wrong:
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @if (Session::has('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
          @endif
          @if (Session::has('error'))
          <div class="alert alert-danger">
            {{ Session::get('error') }}
          </div>
          @endif
          <div class="form-group">
            <input type="email" name="email" class="form-control gray border-0" placeholder="Email Rumah Sakit" required>
          </div>
          <div class="form-group">
            <input id="password-field" name="password" type="password" class="form-control gray border-0" placeholder="Password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3  text-dark" data-toggle="modal" data-target="#exampleModalCenter">Login</button>
          </div>
          <div class="form-group justify-content-center text-center mt-3">
            <p><a href="{{ route('registerRS') }}" style="color: blue" class="">Belum memiliki akun?</a> </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--Akhir Form Login Rumah Sakit-->
@endsection