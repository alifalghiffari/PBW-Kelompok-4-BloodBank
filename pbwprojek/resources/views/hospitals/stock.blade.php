@extends('layout.main')

@section('title', 'Gudang Darah | Stok Darah')

@section('home')
<a class="navbar-brand nav1 ms-3" href="homeRs">
  <h3>GUDANG DARAH</h3>
</a>
@endsection

@section ('nav-item')
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ms-auto">
    <li class="nav-item active">
      <a class="nav-link ps" href="stokdarahRs">Update Darah</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/requestRs">
        Permintaan
      </a>
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

@section ('container')
<div class="container d-flex justify-content-center align-item-center" style="margin-top:12% !important;">
  <div class="row">
    <div class="col-sm-5">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <h2 class=" p-3 mb-2 text-white" style="text-align : center; background-color: #4B7971;">Stok Darah</h2>
        <form action="stokdarahRs/store/{{ Auth::user()->id }}" method="post">
          @csrf
          <div class="mt-3">
            <label for="">Golongan Darah</label>
            <select class="form-control" name="gol_darah" required="">
              <option disabled selected>Golongan Darah</option>
              <option value="A-">A-</option>
              <option value="A+">A+</option>
              <option value="B-">B-</option>
              <option value="B+">B+</option>
              <option value="AB-">AB-</option>
              <option value="AB+">AB+</option>
              <option value="O-">O-</option>
              <option value="O+">O+</option>
            </select><br>
          </div>
          <div class="mb-3">
            <label for="">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah (kantong)" required="">
          </div>
          <button type="submit" class="btn btn-primary float-end">
            <!-- <a href="stokdarahRs/store?id={{ Auth::user()->id }}"> -->
            Submit
          </button>
        </form>
      </div>
    </div>
    <div class="col-sm-7">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <table class="table table-light table-hover custom " id="myTable">
          <tr style="text-align:center;font-weight:bold;">
            <th>NO.</th>
            <th>Gol.Darah</th>
            <th>Jumlah (Kantong)</th>
            <th>Action</th>
          </tr>

          @foreach($stok_darah as $sd)
          <tr style="text-align:center;">
            <td>{{$loop->iteration}}</td>
            <td>{{ $sd->gol_darah }}</td>
            <td>{{ $sd->jumlah}}</td>
            <td>
              <button type="button" class="btn btn-primary">
                <a href="/stokdarahRs/delete/{{ $sd->id }}" style="color:white;">Delete</a>
              </button>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@endsection