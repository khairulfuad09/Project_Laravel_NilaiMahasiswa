<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
// use App\Models\Nilai;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = DB::table('mahasiswas')->paginate(10);
        return view('mahasiswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'program_studi' => 'required',
            'no_hp' => 'required | min:11',
        ]);

        $query =  Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'program_studi' => $request->program_studi,
            'no_hp' => $request->no_hp,
        ]);

        if ($query) {
            return redirect('/mahasiswa');
        } else {
            return back()->with('error', 'Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Edit data mahasiswa';
        $data['mhs'] = DB::table('mahasiswas')->where('id', $id)->first();
        return view('editmahasiswa', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $query =  DB::table('mahasiswas')->where('id', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'program_studi' => $request->program_studi,
            'no_hp' => $request->no_hp,
        ]);


        if ($query) {
            return redirect('/mahasiswa');
        } else {
            return back()->with('error', 'Gagal Mengupdate Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('mahasiswas')->where('id', $id)->delete();
        if ($query) {
            return redirect('/mahasiswa');
        }
    }
}
