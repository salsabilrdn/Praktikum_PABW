@extends('layouts.main')

@section('content')
<h3>Form Lamaran</h3>

<form action="/lamaran" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf

    <div class="mb-3">
        <label class="form-label">Lowongan</label>
        <select name="lowongan_id" class="form-select">
            @foreach($lowongans as $l)
                <option value="{{ $l->id }}">{{ $l->posisi }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi Lamaran</label>
        <textarea name="deskripsi_lamaran" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload CV</label>
        <input type="file" name="cv_file" class="form-control">
    </div>

    <button class="btn btn-success">Kirim Lamaran</button>
</form>
@endsection
