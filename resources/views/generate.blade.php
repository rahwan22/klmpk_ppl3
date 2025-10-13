@extends('layout')

@section('content')
<div class="card">
  <h3>Generate & Cetak QR</h3>
  <p class="muted">Pilih kelas atau siswa untuk mencetak QR Code.</p>

  <div style="margin-top:12px;">
    <select style="padding:8px;border:1px solid #e6eef7;border-radius:8px;">
      <option>Pilih Kelas</option>
      <option>X IPA 1</option>
      <option>XI IPS 2</option>
    </select>
    <button class="btn">Generate</button>
  </div>

  <div style="margin-top:20px;">
    <div class="muted">Hasil QR Code:</div>
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=0001" alt="QR" style="margin-top:10px;">
  </div>
</div>
@endsection
