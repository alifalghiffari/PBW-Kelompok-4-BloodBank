@extends('layout.main')

@section('title', 'Gudang Darah | Stok Darah')

@section('home')
<a class="navbar-brand nav1 ms-3" href="/home">
    <h3>GUDANG DARAH</h3>
</a>
@endsection

@section('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
            <a class="nav-link ps" href="#">Stok Darah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/request">Permohonan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="akun/{{ Auth::user()->id }}">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->name }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <strong>Logout</strong>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('container')
<!-- Form Edit Rumah Sakit-->
<div class="mt-5 d-flex row justify-content-center">
    <div class="col-md-6 col-lg-3">
        <div class="login-wrap margin">
            <button class="btn btn-block btn-primary" href="">Minta Darah</button>
        </div>
        @foreach($stok_darah as $p)
        <form action="/stokdarah/store" method="post" class=" shadow p-3 mb-5 bg-white rounded">
            @csrf
            <div class="form-group">
                <input type="hidden" name="Request_id" value="">
                <input type="hidden" name="id" value="{{ $p->id }}">
                <input type="hidden" name="id_user" value="{{ Auth::user()->id}}">
                <div class="form-group">
                    <label class="fw-bold text-black form-label">Golongan Darah</label>
                    <input type="text" required="required" name="gol_darah" class="form-control gray border-0" value="{{ $p->gol_darah }}" disabled>
                </div>
                <div class="form-group">
                    <label class="fw-bold text-black form-label">Jumlah yang diminta</label>
                    <input type="number" name="jumlah_darah" class="form-control gray border-0" required="">
                </div>
                <div class="row">
                    <div class="col">
                        <center><a href="/stokdarah" class="btn btn-block btn-danger text-center">Cancel</a><br></center>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-block btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</div>
<!--Akhir Form Edit Rumah Sakit-->
@endsection