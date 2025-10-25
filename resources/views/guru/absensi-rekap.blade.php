@extends('layout.main')

@section('content')
<div class="container mt-4">
  <h4>Rekap Absensi Kelas</h4>
  <form class="row mb-3" method="GET">
    <div class="col-md-3">
      <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary">Tampilkan</button>
    </div>
  </form>
  <table class="table table-striped">
    <thead>
      <tr><th>No</th><th>Nama</th><th>Hadir</th><th>Izin</th><th>Sakit</th><th>Alpa</th><th>Terlambat</th></tr>
    </thead>
    <tbody>
      {{-- @foreach($rekap as $r)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $r->nama_siswa }}</td>
        <td>{{ $r->hadir }}</td>
        <td>{{ $r->izin }}</td>
        <td>{{ $r->sakit }}</td>
        <td>{{ $r->alpa }}</td>
        <td>{{ $r->terlambat }}</td>
      </tr>
      @endforeach --}}
    </tbody>
  </table>
</div>
@endsection
