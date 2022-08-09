
{{-- @if($user->role == "Mahasiswa") --}}
@extends('layouts.app')    
{{-- @else
    @extends('layouts.appmhs')    
@endif --}}

@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Mahasiswa</h1>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Mahasiswa</button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>NIM</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $no => $item)
                            
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$item->no_induk}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal{{$item->id}}">Edit</button> <a href="{{url('mahasiswa/'. $item->id)}}" class="btn btn-sm btn-danger">Hapus</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<form action="{{url('mahasiswa/')}}" method="post">
    @csrf
    @method('POST')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input required type="number" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM">
              </div>
            <div class="form-group">
                <label for="11">Nama</label>
                <input required type="text" name="name" class="form-control" id="11" placeholder="Masukkan Nama">
              </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input required type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <b>Notes :</b> <br>
              Password Default <b>12345678</b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>




@foreach ($mahasiswa as $no => $item)

<form action="{{url('mahasiswa/'. $item->id)}}" method="post">
    @csrf
    @method('PUT')
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input required type="number" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM" value="{{$item->no_induk}}">
              </div>
            <div class="form-group">
                <label for="11">Nama</label>
                <input required type="text" name="name" class="form-control" id="11" placeholder="Masukkan Nama" value="{{$item->name}}">
              </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input required type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$item->email}}">
              </div>
              <b>Notes :</b> <br>
              Password Default <b>12345678</b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endforeach
@endsection
              