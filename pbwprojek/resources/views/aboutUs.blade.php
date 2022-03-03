@extends('layout.main')

@section('title', 'Gudang Darah | AboutUs')

@section('home')
<a class="navbar-brand nav1 ms-3" href="">
    <h3>GUDANG DARAH</h3>
</a>
@endsection

@section ('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
            <a class="nav-link ps" href="#">About Us</a>
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
</br>
</br>
</br>
</br>
</br>

<div class="container">
    <h1>OUR TEAM</h1>
    <div class=" mt-3 card-group text-center">
        <div class="card">
            <img src="img/MuammarYasir1.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Muammar Yasir</h5>
                <p class="fst-italic">"Setelah Makan <br>Alangkah <br>Baiknya Pulang"<br></p>
            </div>
        </div>
        <div class="card">
            <img src="img/agip.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Alif Alghiffari</h5>
                <p class="fst-italic">"Ini hanya hari yang <br>buruk, bukan kehidupan <br>yang buruk"<br></p>
            </div>
        </div>
        <div class="card">
            <img src="img/dimas.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Dimas Rendy</h5>
                <p class="fst-italic">"Pengetahuan, <br>Pengalaman,<br>Proses"<br></p>
            </div>
        </div>
        <div class="card">
            <img src="img/nailul1.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nailul Fithriya</h5>
                <p class="fst-italic">"Setiap hal yang dimulai haruslah <br>diperjuangkan hingga akhir"<br></p>
            </div>
        </div>
        <div class="card">
            <img src="img/putri.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Putri Mahela</h5>
                <p class="fst-italic">"Hal-hal besar tidak pernah <br> datang dari zona nyaman"<br></p>
            </div>
        </div>
    </div>
</div>

@endsection