@extends('layout')

@section('content')
<div class="card">
  <h3>Laporan Absensi</h3>
  <p class="muted">Filter data berdasarkan kelas dan tanggal.</p>

  <div style="margin-top:10px;">
    <input type="date" />
    <select style="padding:8px;border:1px solid #e6eef7;border-radius:8px;">
      <option>Kelas</option>
      <option>X IPA 1</option>
      <option>XI IPS 2</option>
    </select>
    <button class="btn">Tampilkan</button>
  </div>

  <table style="margin-top:20px;">
    <thead><tr><th>NIS</th><th>Nama</th><th>Status</th><th>Tanggal</th></tr></thead>
    <tbody>
      <tr><td>0001</td><td>Ahmad</td><td>Hadir</td><td>2025-10-13</td></tr>
      <tr><td>0002</td><td>Siti</td><td>Izin</td><td>2025-10-13</td></tr>
    </tbody>
  </table>
</div>
@endsection
