<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kontrak_mahasiswa;
use App\Models\Matakuliah;
use App\Models\Semester;
use Illuminate\Support\Facades\Auth;

class KontrakMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Kontrak Matakuliah";
        $data['user'] = AUTH::User();
        $data['semester'] = Semester::where('is_active', 1)->first();
        $data['matakuliah'] = Matakuliah::all();
        $data['mahasiswa'] = User::where('role', "Mahasiswa")->get();

        return view('dosen.kontrak_mahasiswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $semester_id = Semester::where('is_active', 1)->first();
        $user = User::where('role', "Mahasiswa")->get();
        Kontrak_mahasiswa::where('matakuliah_id', $request->mk)->where('semester_id', $semester_id->id)->delete();
        foreach($user as $um){
            $mhs = "mhs".$um->id;
            $mhss = $request[$mhs];
            if($mhss){
                $save = new Kontrak_mahasiswa;
                $save->semester_id = $semester_id->id;
                $save->users_id = $mhss;
                $save->matakuliah_id = $request->mk;
                $save->save();
            }

        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Matakuliah::where('id', $id)->delete();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Matakuliah::where('id', $id)->update([
            'nama_matakuliah' => $request->matakuliah,
            'sks' => $request->sks
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
