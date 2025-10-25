@extends('layout.main')

@section('content')
<div class="container mt-4">
  <h4>Daftar Absensi Kelas {{ $kelas->nama }}</h4>
  <div class="text-end mb-3">
    <a href="{{ route('guru.absensi.scan') }}" class="btn btn-success">
      <i class="bi bi-qr-code-scan"></i> Scan QR
    </a>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th><th>NIS</th><th>Nama</th><th>Status</th><th>Masuk</th><th>Pulang</th>
      </tr>
    </thead>
    <tbody>
      @foreach($absensi as $a)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $a->nis }}</td>
        <td>{{ $a->nama_siswa }}</td>
        <td>{{ $a->status }}</td>
        <td>{{ $a->waktu_masuk ?? '-' }}</td>
        <td>{{ $a->waktu_pulang ?? '-' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
