@extends('layout.main')

@section('title', 'Gudang Darah | Permohonan')

@section('home')
<a class="navbar-brand nav1 ms-3" href="/home">
    <h3>GUDANG DARAH</h3>
</a>
@endsection

@section ('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link ps" href="/stokdarah">Stok Darah</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Permohonan</a>
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
    <form action="/request/cari" method="GET">
        <input type="text" name="cari" placeholder="Pencarian..." value="{{ old('cari') }}">
        <input type="submit" value="Cari Sekarang">
    </form>
</div>
@endsection

@section('container')

<div class="container shadow p-3 mb-5 bg-body rounded" style="margin-top: 2% !important;">
    <h1 class="p-2 mb-2 text-white text-center" style="background-color: #4B7971;">PERMOHONAN</h1>
    <table class="table table-hover custom">
        <tr class="text-center">
            <th>NO</th>
            <th>RUMAH SAKIT</th>
            <th>KOTA</th>
            <th>EMAIL</th>
            <th>NO HP</th>
            <th>GOLONGAN DARAH</th>
            <th>JUMLAH (Kantong)</th>
            <th>PERMINTAAN</th>
            <th>ACTION</th>
        </tr>

        @foreach($stok_darah as $blood)
        <tr class="text-center">
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">{{ $blood-> name }}</td>
            <td>{{ $blood->kota}}</td>
            <td>{{ $blood->email }}</td>
            <td>{{ $blood->nohp }}</td>
            <td>{{ $blood->gol_darah }}</td>
            <td>{{$blood->jumlah_darah}}</td>
            <td>{{$blood->status}}</td>
            <td>
                @if($blood->status != "pending")
                <button disabled class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Permintaan yang sudah direspon tidak dapat dibatalkan">
                    Batalkan
                </button>
                @else
                <a class="btn btn-danger" href="request/batal/{{ $blood->Request_id }}">Batalkan</a>
                @endif
            </td>

        </tr>
        @endforeach
    </table>
</div>

@endsection