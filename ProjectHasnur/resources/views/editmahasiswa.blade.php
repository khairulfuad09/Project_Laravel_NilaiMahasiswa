@extends('partials.main')
@section('container')
    <form action="/mahasiswa/{{ $mhs->id }}" method="post">
        @method('put')
        @csrf
        <div class="" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nim</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nim" value="{{ $mhs->nim }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama" value="{{ $mhs->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Program Studi</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="program_studi" value="{{ $mhs->program_studi }}"
                                    required>
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
    </form>
@endsection
