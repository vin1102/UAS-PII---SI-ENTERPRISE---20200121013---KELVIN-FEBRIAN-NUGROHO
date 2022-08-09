@php
    use App\Models\Kontrak_mahasiswa;
@endphp
{{-- @if($user->role == "Mahasiswa") --}}
@extends('layouts.app')    
{{-- @else
    @extends('layouts.appmhs')    
@endif --}}

@section('content')
      <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Kontrak Mahasiswa Semester {{$semester->semester}}</h1>
        <div class="card">
          
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($matakuliah as $item)
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="home-tab{{$item->id}}" data-toggle="tab" data-target="#home{{$item->id}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$item->nama_matakuliah}}</button>
                    </li>
                    @endforeach
                    
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach ($matakuliah as $item)
                

                    <div class="tab-pane" id="home{{$item->id}}" role="tabpanel" aria-labelledby="home-tab{{$item->id}}">
                    <div class="container">
                        <br>
                        <div class="text-right">
                            <button class="btn btn-primary mb-2"  data-toggle="modal" data-target="#exampleModal{{$item->id}}">Setting</button>
                        </div>
                        @php
                            
                          $data = Kontrak_mahasiswa::where('matakuliah_id', $item->id)->where('semester_id', $semester->id)->get()
                        @endphp
                        <table class="table">
                            <tr>
                                <th>NIM</th>
                                <th>Name</th>
                            </tr>
                            @foreach ($data as $km)
                           
                            <tr>
                                <th>{{$km->users->no_induk}}</th>
                                <th>{{$km->users->name}}</th>
                            </tr>
                                
                            @endforeach
                        </table>    
                    </div>    
                    
                    
      <form action="{{url('kontrak_mahasiswa')}}" method="post">   
        @csrf
        @method('POST')         
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Setting Mahasiswa {{$item->nama_matakuliah}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="mk" value="{{$item->id}}">
          <table class="table">
              <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Pilih</th>
              </tr>
            @foreach ($mahasiswa as $mhs)
            @php
                $cek = Kontrak_mahasiswa::where('users_id', $mhs->id)->where('matakuliah_id', $item->id)->where('semester_id', $semester->id)->first();
            @endphp
            <tr>
                <td>{{$mhs->no_induk}}</td>
                <td>{{$mhs->name}}</td>
                <td><div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1"
                    @if ($cek)
                        checked
                    @endif
                    name="mhs{{$mhs->id}}" value="{{$mhs->id}}"
                    >
                    <label class="form-check-label" for="exampleCheck1" >Pilih</label>
                  </div>
                </td>
               
            </tr>
            @endforeach

          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>  
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    
  
@endsection
              