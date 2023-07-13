@extends('partials.main')
@section('container')
    {{-- @dd($mahasiswa) --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Nilai Mahasiswa</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Data Nilai
    </button>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Mata kuliah</th>
                <th scope="col">Nilai tugas</th>
                <th scope="col">Nilai uts</th>
                <th scope="col">Nilai uas</th>
                <th scope="col">Grade</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $nl)
                <tr>
                    <td>{{ $nl->nim }}</td>
                    <td>{{ $nl->nama }}</td>
                    <td>{{ $nl->program_studi }}</td>
                    <td>{{ $nl->mata_kuliah }}</td>
                    <td>{{ $nl->tugas }}</td>
                    <td>{{ $nl->uts }}</td>
                    <td>{{ $nl->uas }}</td>
                    <td>{{ $nl->grade }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Edit
                        </button>
                        <form action="/nilai/{{ $nl->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal -->
                <form action="/nilai/{{ $nl->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nim</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="nim" value="{{ $nl->nim }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mata Kuliah</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="mata_kuliah"
                                                value="{{ $nl->mata_kuliah }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nilai Tugas</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="tugas" value="{{ $nl->tugas }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nilai Uts</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="uts" value="{{ $nl->uts }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nilai Uas</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="uas" value="{{ $nl->uas }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </tbody>
    </table>
    {{ $nilai->links() }}
@endsection

<!-- Modal -->
<form action="/nilai" method="post">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Nilai Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nim</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mata Kuliah</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="mata_kuliah" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nilai Tugas</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="tugas" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nilai Uts</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="uts" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nilai Uas</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="uas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
