@php
    use App\Models\Absen;
    use App\Models\Absen_mahasiswa;
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
                <h5>Daftar Matakuliah</h5>
                <table class="table table-responsive">
             
                    
                    @foreach ($mk as $no => $mkk)
                    <tr>
                        <th class="text-center">
                            {{$mkk->matakuliah->nama_matakuliah}}
                        </th>
                        @php
                            $absen = Absen::where('matakuliah_id', $mkk->matakuliah_id)->where('semester_id', $mkk->semester_id)->get();
                        @endphp
                        @foreach ($absen as $no => $item)
                        <td>
                            @php
                                $cek = Absen_mahasiswa::where('users_id', $user->id)->where('absen_id', $item->id)->first();
                            @endphp
                            @if ($cek != NULL)
                            <button class="btn btn-sm btn-success">P {{$no+1}}
                            </button>
                            @else
                            <button class="btn btn-sm btn-danger">P {{$no+1}}
                            </button>
                                
                            @endif
                            <small>{{$item->waktu_absen}}</small>
                        </td>
                        @endforeach
                        
                    </tr>
                    @endforeach
                           
                 
                     
                    
            
                    </table>
                    <div class="text-right">

                        <button class="btn btn-success"></button> : Hadir
                        <button class="btn btn-danger"></button> : Tidak Hadir
                    </div>
              
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
              