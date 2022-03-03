@extends('layout.main')

@section('title', 'Gudang Darah | Home')

@section('home')
<a class="navbar-brand nav1 ms-3" href="homeRs">
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
            <a class="nav-link" href="/requestRs">Permintaan Darah</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="akunRs/{{ Auth::user()->id }}">
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
</br>
</br>
<div class="d-flex row justify-content-center">
    <div class="container mt-1">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Selamat datang <strong>{{ Auth::user()->name }}</strong></h3>
                    </center>
                </div>
                <div class="card-body">
                    <div>
                        <div style="width: 100%">
                            <img src="img/pic2.png" alt="pic2" width="500" height="400" style="float:right;">
                            <div>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                                <h1><b>Hello</b></h1>
                                <h5><b>Gudang Darah</b> merupakan sistem manajemen yang membantu masyarakat dan rumah sakit terkait kebutuhan kantong darah yang dibutuhkan untuk donor darah dan berbagai keperluan yang terkait.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection