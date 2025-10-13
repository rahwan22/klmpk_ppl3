@extends('layout')

@section('content')
<div class="card">
  <h3>Absensi - Scan QR</h3>
  <p class="muted">Gunakan kamera untuk memindai QR Code siswa.</p>

  <div style="margin-top:20px;">
    <div style="background:#f1f5f9;height:240px;display:flex;align-items:center;justify-content:center;border-radius:12px;">
      <span class="muted">[ Area Kamera - Placeholder ]</span>
    </div>
  </div>

  <div style="margin-top:20px;">
    <table>
      <thead><tr><th>Waktu</th><th>NIS</th><th>Nama</th><th>Status</th></tr></thead>
      <tbody>
        <tr><td>08:10</td><td>0001</td><td>Ahmad</td><td>Hadir</td></tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
