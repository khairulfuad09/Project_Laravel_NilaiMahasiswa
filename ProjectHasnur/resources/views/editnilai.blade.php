@extends('partials.main')
@section('container')
    <!-- Modal -->
    <form action="/nilai/{{ $nl->id }}" method="post">
        @method('put')
        @csrf
        <div class="" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                                    aria-describedby="emailHelp" name="nim" value="{{ $nl->nim }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Kuliah</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="mata_kuliah" value="{{ $nl->mata_kuliah }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nilai Tugas</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tugas" value="{{ $nl->tugas }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nilai Uts</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="uts" value="{{ $nl->uts }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nilai Uas</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="uas" value="{{ $nl->uas }}" required>
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
