@php
    use App\Models\Absen_mahasiswa;
    use App\Models\Absen;
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
        <h1 class="h3 mb-4 text-gray-800">Absensi Mahasiswa</h1>
        <div class="card">
            <div class="card-body">
                <h5>Daftar Mahasiswa</h5>
                <div class="row">
                  <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      @foreach ($mk as $item)
                      
                      <button class="nav-link" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home{{$item->id}}" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$item->nama_matakuliah}}</button>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                      @foreach ($mk as $item)
                      <div class="tab-pane" id="v-pills-home{{$item->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        @php
                            $mhss = Kontrak_mahasiswa::where('matakuliah_id', $item->id)->where('semester_id', $semester->id)->get();
                        @endphp
                              <table class="table table-responsive">
                            <tr>
                              <td>#</td>
                              <td>NIM</td>
                              <td>Nama</td>
                              @php
                              $abs = Absen::where('matakuliah_id', $item->id)->where('semester_id', $semester->id)->get();
                          @endphp


                          @foreach ($abs as $no => $ss)
                          <td><h4>P {{$no+1}}</h4>
                            {{$ss->waktu_absen}}</td>
                          @endforeach
                              <td> 
                                <a  href="{{url('absenMhs/'. $item->id)}}" class="btn btn-primary ml-2"><i class="fas fa-plus"></i></a>
                              </td>
                            </tr>
                            @foreach ($mhss as $no=> $mhs)
                              <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$mhs->users->no_induk}}</td>
                                <td>{{$mhs->users->name}}</td>
                              
                                @foreach ($abs as $ss)
                                @php
                                   $cek = Absen_mahasiswa::where('users_id', $mhs->users_id)->where('absen_id', $ss->id)->first();
                                @endphp
                                @if($cek)
                                <td class="text-center"><a href="{{url('actionabsen/'. $cek->id)}}" class="btn btn-success">Hadir</a></td>
                                @else
                                <td class="text-center"><a href="{{url('actionabsen/'. $mhs->users_id .'/'.$ss->id)}}" class="btn btn-danger">Absen</a></td>
                                    
                                @endif
                            @endforeach
                                <td></td>
                              </tr>
                            @endforeach
                          </table>    
                      
                      
                      
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>

              


            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

   @endsection
              