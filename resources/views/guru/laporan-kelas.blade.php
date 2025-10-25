@extends('layout.main')

@section('content')
<div class="container mt-4">
  <h4>Laporan Absensi Kelas</h4>
  <p>Kelas: {{ $kelas->nama }}</p>
  <table class="table table-bordered">
    <thead>
      <tr><th>No</th><th>Nama</th><th>Hadir</th><th>Izin</th><th>Sakit</th><th>Alpa</th><th>Terlambat</th></tr>
    </thead>
    <tbody>
      @foreach($laporan as $l)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $l->nama_siswa }}</td>
        <td>{{ $l->hadir }}</td>
        <td>{{ $l->izin }}</td>
        <td>{{ $l->sakit }}</td>
        <td>{{ $l->alpa }}</td>
        <td>{{ $l->terlambat }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
