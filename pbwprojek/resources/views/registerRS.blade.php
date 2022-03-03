@extends('layout.main')
@section('title', 'Gudang Darah | Daftar')

@section('home')
<a class="navbar-brand nav1 ms-3" href="#">
  <h3>GUDANG DARAH</h3>
</a>
@endsection

@section ('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ms-auto">
    <li class="nav-item">
      <a class="nav-link ps" href="aboutUs">About Us</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link ps" href="{{ route('registerRS') }}">Daftar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link ps" href="{{ route('loginRS') }}">Login</a>
    </li>
  </ul>
</div>
@endsection

@section('container')
<!-- Form Register Rumah Sakit-->
<div class="d-flex row justify-content-center">
  <div class="col-md-6 col-lg-3">
    <div class="login-wrap margin">
      <div class="bg-primary">
        <ul class="nav nav-tabs" id="" role="tablist">
          <li class="nav-item w-50">
            <a class="nav-link  text-dark bg-primary " data-toggle="" href="" aria-expanded="true">Rumah Sakit</a>
          </li>
          <li class="nav-item w-50 text-md-right">
            <a class="nav-link text-white bg-primary" id="" data-toggle="" href="{{ route('registerUser') }}" aria-expanded="false">Penerima</a>
          </li>
        </ul>
      </div>
      <form action="{{ route('registerRS') }}" class="signin-form shadow p-3 mb-5 bg-white rounded" method="post">
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
          <div class="form-group">
            <input type="text" name="name" class="form-control  gray border-0" placeholder="Nama Rumah Sakit" required>
          </div>
          <div class="form-group">
            <input type="text" name="kota" class="form-control gray border-0" placeholder="Kota" required>
          </div>
          <div class="form-group">
            <input type="text" name="nohp" class="form-control gray border-0" placeholder="Nomor Hp Rumah Sakit" onkeypress="return hanyaAngka(event)" required>
          </div>
          <script>
            function hanyaAngka(event) {
              var angka = (event.which) ? event.which : event.keyCode
              if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)) {
                return false;
              }
              return true;
            }
          </script>
          <div class="form-group">
            <input type="email" name="email" class="form-control gray border-0" placeholder="Email Rumah Sakit" required>
          </div>
          <div class="form-group">
            <input id="password-field" name="password" type="password" class="form-control gray border-0" placeholder="Password" required>
          </div>
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control gray border-0" placeholder="Konfirmasi Password">
          </div>
          <div class="">
            <input type="hidden" name="hak_akses" class="form-control  gray border-0" value="rs">
          </div>
          <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3  text-dark" data-toggle="modal" data-target="#exampleModalCenter">Register</button>
          </div>

          <!-- Modal -->
          <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"   aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="text-center pb-4">
                    Terima Kasih Telah Mendaftar
                  </div>
                  <div class="d-flex justify-content-center ">
                    <button type="button" class="btn btn-success  mt-3 mb-4" data-dismiss="modal">OK</button>
                  </div>
                </div>
              </div>
            </div> -->
          <!--Akhir Modal-->
          <div class="form-group justify-content-center text-center mt-3">
            <p><a href="{{ route('loginRS') }}" style="color: blue" class="">Sudah memiliki akun?</a> </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--Akhir Form Register Rumah Sakit-->

@endsection