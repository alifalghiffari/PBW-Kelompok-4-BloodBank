@extends('layout.main')

@section('title', 'Gudang Darah | Permohonan')

@section('home')
<a class="navbar-brand nav1 ms-3" href="homeRs">
    <h3>GUDANG DARAH</h3>
</a>
@endsection

@section ('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link ps" href="stokdarahRs">Update Darah</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/requestRs">Permintaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="akunRs/{{ Auth::user()->id }}">
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
<div class="position-relative" style="margin-top: 9% !important; margin-left: 7%;">
    <p>Cari Golongan darah :</p>
    <form action="/request/cariRs" method="GET">
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
            <th>NAMA</th>
            <th>KOTA</th>
            <th>EMAIL</th>
            <th>NO HP</th>
            <th>GOLONGAN DARAH</th>
            <th>JUMLAH</th>
            <th>PERMINTAAN</th>
            <th>ACTION</th>
        </tr>

        @foreach($stok_darah as $blood)
        <tr class="text-center">
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">{{ $blood-> name }}</td>
            <td>{{ $blood->kota}}</td>
            <td class="text-center">{{ $blood->email }}</td>
            <td>{{ $blood->nohp }}</td>
            <td>{{ $blood->gol_darah }}</td>
            <td>{{$blood->jumlah_darah}}</td>
            <td>{{$blood->status}}</td>
            <td style="color: white;">
                @if($blood->status == "Diterima")
                <a href="/requestRs/TolakRs?id={{$blood-> Request_id}}"> <button class="btn btn-danger"><i class="bi bi-x-circle"></i></button></a>
                <a href="/requestRs/TerimaRs?id={{$blood-> Request_id}}"><button disabled class="btn btn-success"><i class="bi bi-check-circle"></i></button></a>
                @elseif($blood->status == "Ditolak")
                <a href="/requestRs/TolakRs?id={{$blood-> Request_id}}"> <button disabled class="btn btn-danger"><i class="bi bi-x-circle"></i></button></a>
                <a href="/requestRs/TerimaRs?id={{$blood-> Request_id}}"><button class="btn btn-success"><i class="bi bi-check-circle"></i></button></a>
                @else
                <a href="/requestRs/TolakRs?id={{$blood-> Request_id}}"> <button class="btn btn-danger"><i class="bi bi-x-circle"></i></button></a>
                <a href="/requestRs/TerimaRs?id={{$blood-> Request_id}}"><button class="btn btn-success"><i class="bi bi-check-circle"></i></button></a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection