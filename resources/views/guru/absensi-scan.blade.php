@extends('layout.main')

@section('content')
<div class="container mt-4">
  <h4>Scan QR Absensi</h4>
  <div class="card p-3 text-center">
    <video id="preview" width="100%" height="400"></video>
    <p class="text-muted mt-2">Arahkan kamera ke QR Code siswa</p>
  </div>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
  const html5QrCode = new Html5Qrcode("preview");
  html5QrCode.start(
    { facingMode: "environment" },
    { fps: 10, qrbox: 250 },
    (decodedText) => {
      fetch(`/guru/absensi/scan/process?qr=${decodedText}`)
        .then(res => res.json())
        .then(data => alert(data.message));
    }
  );
</script>
@endsection
