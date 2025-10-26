<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Absensi Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #f9f9f9;
    }

    .sidebar {
      min-height: 100vh;
      background: #1f3c88;
      color: white;
      padding: 20px 10px;
    }

    .sidebar a {
      color: #fff;
      display: block;
      padding: 8px 10px;
      border-radius: 8px;
      text-decoration: none;
      margin-bottom: 6px;
    }

    .sidebar a.active,
    .sidebar a:hover {
      background: #3f63c5;
    }

    .content {
      padding: 20px;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h5 class="text-center mb-4">Guru Panel</h5>
        <a href="{{ route('guru.dashboard') }}" class="{{ request()->routeIs('guru.dashboard') ? 'active' : '' }}"><i class="bi bi-house"></i> Dashboard</a>
        <a href="{{ route('guru.absensi.daftar') }}" class="{{ request()->routeIs('guru.absensi.*') ? 'active' : '' }}"><i class="bi bi-card-checklist"></i> Data Absensi</a>
        <a href="{{ route('guru.absensi.scan') }}"><i class="bi bi-qr-code-scan"></i> Scan QR</a>
        <a href="{{ route('guru.absensi.rekap') }}"><i class="bi bi-bar-chart"></i> Rekap Absensi</a>
        <a href="{{ route('guru.izin.form') }}"><i class="bi bi-pencil-square"></i> Input Izin/Sakit</a>
        <a href="{{ route('guru.laporan.kelas') }}"><i class="bi bi-file-earmark-text"></i> Laporan Kelas</a>
        <a href="{{ route('guru.pengumuman') }}"><i class="bi bi-megaphone"></i> Pengumuman</a>
        <a href="{{ route('guru.profil') }}"><i class="bi bi-person"></i> Profil</a>
        <hr>
        <a href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
      </div>

      <!-- Content -->
      <div class="col-md-10 content">

        @yield('content')


      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>