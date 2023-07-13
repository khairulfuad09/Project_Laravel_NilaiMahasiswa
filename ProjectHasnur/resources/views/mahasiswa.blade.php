@extends('partials.main')
@section('container')
    {{-- @dd($mahasiswa) --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Mahasiswa</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Mahasiswa
    </button>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Program Studi</th>
                <th scope="col">No Hp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->program_studi }}</td>
                    <td>{{ $mhs->no_hp }}</td>
                    <td>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Edit
                        </button> --}}
                        <a class="btn btn-primary" href="/mahasiswa/{{ $mhs->id }}/edit">Edit</a>
                        <form action="/mahasiswa/{{ $mhs->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal -->
                {{-- <form action="/mahasiswa/{{ $mhs->id }}" method="post">
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
                                                aria-describedby="emailHelp" name="nim" value="{{ $mhs->nim }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="nama" value="{{ $mhs->nama }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Program Studi</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="program_studi"
                                                value="{{ $mhs->program_studi }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Hp</label>
                                            <input type="text"
                                                class="form-control @error('no_hp')
                                                is-invalid
                                            @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" name="no_hp"
                                                value="{{ $mhs->no_hp }}" required>
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                </form> --}}
            @endforeach
        </tbody>
    </table>
    {{ $mahasiswa->links() }}
@endsection

<!-- Modal -->
<form action="/mahasiswa" method="post">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nim</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Program Studi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="program_studi" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Hp</label>
                        <input type="text"
                            class="form-control @error('no_hp')
                            is-invalid
                        @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="no_hp" required>
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
