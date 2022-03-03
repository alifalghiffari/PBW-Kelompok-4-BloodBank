@extends('layout.main')

@section('title', 'Gudang Darah | Akun')

@section('home')
<a class="navbar-brand nav1 ms-3" href="/homeRs">
    <h3>GUDANG DARAH</h3>
</a>
@endsection

@section ('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link ps" href="/stokdarahRs">Update Darah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/requestRs">Permintaan </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->name }}
            </a>
        </li>
        <li class="nav-item">
            <a class=" nav-link " href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <strong>Logout</strong>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('container')
<!-- Form Edit Rumah Sakit-->
<div class="d-flex row justify-content-center">
    <div class="col-md-6 col-lg-3">
        <div class="login-wrap margin">
            <button class="btn btn-block btn-primary" href="">Rumah Sakit</button>
        </div>
        @foreach($users as $p)
        <form action="/updateRs" method="post" class=" shadow p-3 mb-5 bg-white rounded">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $p->id }}">
                <div class="form-group">
                    <label class="fw-bold text-black form-label">Nama</label>
                    <input type="text" required="required" name="name" class="form-control gray border-0" value="{{ $p->name }}">
                </div>
                <div class="form-group">
                    <label class="fw-bold text-black form-label">Kota</label>
                    <input type="text" required="required" name="kota" class="form-control gray border-0" value="{{ $p->kota }}">
                </div>
                <div class="form-group">
                    <label class="fw-bold text-black form-label">No HP</label>
                    <input type="number" required="required" name="nohp" class="form-control gray border-0" value="{{ $p->nohp }}">
                </div>
                <div class="form-group">
                    <label class="fw-bold text-black form-label">Email</label>
                    <input type="email" required="required" name="email" class="form-control gray border-0" value="{{ $p->email }}">
                </div>
                <div class="row">
                    <div class="col">
                        <center><a class="btn btn-block btn-danger text-center" onclick="history.back();">Kembali</a><br></center>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-block btn-success" onclick="return confirm('Apakah yakin ingin merubah data akun?')">Update</button>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</div>
<!--Akhir Form Edit Rumah Sakit-->
@endsection