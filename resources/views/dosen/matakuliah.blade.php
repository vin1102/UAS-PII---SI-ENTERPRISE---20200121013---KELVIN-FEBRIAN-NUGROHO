
{{-- @if($user->role == "Mahasiswa") --}}
@extends('layouts.app')    
{{-- @else
    @extends('layouts.appmhs')    
@endif --}}

@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Matakuliah</h1>
        <div class="card">
            <div class="card-title">
                <div class="container-fluid">
                    <a href="" class="btn btn-primary mr-3 mt-3" data-toggle="modal" data-target="#exampleModal">Tambah matakuliah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Matakuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($matakuliah as $no => $item)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$item->nama_matakuliah}}</td>
                            <td>{{$item->sks}}</td>
                            
                            <td><a href="#" data-toggle="modal" data-target="#exampleModaledit{{$item->id}}" class="btn btn-warning">edit</a>  <a href="{{url('matakuliah/'. $item->id)}}" onclick="return confirm('Hapus matakuliah!?')" class="btn btn-danger">hapus</a></td>
                        </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    
    @foreach ($matakuliah as $no => $item)
     
    <form action="{{url('matakuliah/'. $item->id)}}" method="post">
        @csrf
        @method('PUT')
<!-- Modal -->
<div class="modal fade" id="exampleModaledit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah matakuliah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Matakuliah</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="matakuliah" value="{{$item->nama_matakuliah}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SKS</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="sks" value="{{$item->sks}}">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>
    
    
    
    @endforeach
    
    <form action="{{url('matakuliah')}}" method="post">
        @csrf
        @method('POST')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah matakuliah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Matakuliah</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="matakuliah">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SKS</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="sks">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
              