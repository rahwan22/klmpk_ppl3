@extends('layout.main')

@section('content')
<div class="container mt-4">
  <h4>Input Izin / Sakit</h4>
  <form method="POST" action="{{ route('guru.izin.store') }}">
    @csrf
    <div class="mb-3">
      <label for="nis">Pilih Siswa</label>
      <select name="nis" id="nis" class="form-select">
        @foreach($siswa as $s)
          <option value="{{ $s->nis }}">{{ $s->nama_siswa }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-select">
        <option value="Izin">Izin</option>
        <option value="Sakit">Sakit</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Keterangan</label>
      <textarea name="keterangan" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection
