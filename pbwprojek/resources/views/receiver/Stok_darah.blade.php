@extends('layout.main')

@section('title', 'Gudang Darah | Stok Darah')

@section('home')
<a class="navbar-brand nav1 ms-3" href="home">
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


@section('cari')
<div class="mb-4 mt-3 position-relative" style="margin-top: 7% !important; margin-left: 7%;">
    <p>Cari Golongan darah :</p>
    <form action="/stok_darah/cari" method="GET">
        <input type="text" name="cari" placeholder="Pencarian..." value="{{ old('cari') }}">
        <input type="submit" value="Cari Sekarang">
    </form>
</div>
@endsection

@section ('container')
<div class="container shadow p-3 mb-5 bg-body rounded" style="margin-top:2% !important;">
    <h2 class="p-3 mb-2 text-white" style="text-align : center; background-color: #4B7971;">Stok Darah</h2>
    <table class="table table-light table-hover custom " id="myTable">
        <tr style="text-align:center;font-weight:bold;">
            <th>No</th>
            <th>Rumah Sakit</th>
            <th>Kota</th>
            <th>No.Hp</th>
            <th>Email</th>
            <th>Gol.Darah</th>
            <th>Jumlah (Kantong)</th>
            <th>Action</th>
        </tr>

        @foreach($stok_darah as $sd)
        <tr style="text-align:center;">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sd->name }}</td>
            <td>{{ $sd->kota }}</td>
            <td>{{ $sd->nohp }}</td>
            <td>{{ $sd->email }}</td>
            <td>{{ $sd->gol_darah }}</td>
            <td>{{ $sd->jumlah}}</td>
            <td>
                <button class="btn btn-primary"><a href="/stokdarah/minta/{{$sd->id}}" style="color: white;">Minta</a></button>
            </td>
        </tr>
        @endforeach
    </table>

    @endsection