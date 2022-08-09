
{{-- @if($user->role == "Mahasiswa") --}}
@extends('layouts.app')    
{{-- @else
    @extends('layouts.appmhs')    
@endif --}}

@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Semester</h1>
        <div class="card">
            <div class="card-title">
                <div class="container-fluid">
                    <a href="" class="btn btn-primary mr-3 mt-3" data-toggle="modal" data-target="#exampleModal">Tambah semester</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Semester</th>
                        <th>Is Active</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($semester as $no => $item)
                        <tr>
                            <th>{{$no+1}}</th>
                            <th>{{$item->semester}}</th>
                            <th>
                                @if ($item->is_active == 1)
                                    <a href="{{url('semester/'. $item->id .'/edit')}}" class="btn btn-success">Active</a>
                                @else
                                    <a href="{{url('semester/'. $item->id .'/edit')}}" class="btn btn-secondary">Non Active</a>
                                @endif                                
                            </th>
                            <th><a href="#" data-toggle="modal" data-target="#exampleModaledit{{$item->id}}" class="btn btn-warning">edit</a>  <a href="{{url('semester/'. $item->id)}}" onclick="return confirm('Hapus semester!?')" class="btn btn-danger">hapus</a></th>
                        </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    
    @foreach ($semester as $no => $item)
     
    <form action="{{url('semester/'. $item->id)}}" method="post">
        @csrf
        @method('PUT')
<!-- Modal -->
<div class="modal fade" id="exampleModaledit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Semester</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Semester</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="semester" value="{{$item->semester}}">
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
    
    <form action="{{url('semester')}}" method="post">
        @csrf
        @method('POST')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Semester</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Semester</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="semester">
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
              