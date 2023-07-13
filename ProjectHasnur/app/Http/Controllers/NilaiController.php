<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Nilai Mahasiswa';
        $data['nilai'] = DB::table('nilais')
            ->join('mahasiswas', 'nilais.nim', 'mahasiswas.nim')
            ->select('nilais.*', 'mahasiswas.nama', 'mahasiswas.program_studi')
            ->paginate(10);
        return view('nilai', $data);
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
        $rata_rata = ($request->tugas + $request->uts + $request->uas) / 3;
        if ($rata_rata >= 85) {
            $grade = 'A';
        } else if ($rata_rata >= 75 && $rata_rata < 85) {
            $grade = 'B';
        } else if ($rata_rata >= 65 && $rata_rata < 75) {
            $grade = 'C';
        } else if ($rata_rata >= 50 && $rata_rata < 65) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }
        $query =  Nilai::create([
            'nim' => $request->nim,
            'mata_kuliah' => $request->mata_kuliah,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'grade' => $grade,
        ]);

        if ($query) {
            return redirect('/nilai');
        } else {
            return back()->with('error', 'Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Edit Nilai';
        $data['nl'] = DB::table('nilais')->where('id', $id)->first();
        return view('editnilai', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rata_rata = ($request->tugas + $request->uts + $request->uas) / 3;
        if ($rata_rata >= 85) {
            $grade = 'A';
        } else if ($rata_rata >= 75 && $rata_rata < 85) {
            $grade = 'B';
        } else if ($rata_rata >= 65 && $rata_rata < 75) {
            $grade = 'C';
        } else if ($rata_rata >= 50 && $rata_rata < 65) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        $query = DB::table('nilais')->where('id', $id)->update([
            'nim' => $request->nim,
            'mata_kuliah' => $request->mata_kuliah,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'grade' => $grade,
        ]);
        // echo $id;
        if ($query) {
            return redirect('/nilai');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('nilais')->where('id', $id)->delete();
        if ($query) {
            return redirect('/nilai');
        }
    }
}
