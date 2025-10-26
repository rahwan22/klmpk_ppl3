<!-- Sidebar
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
      </div> -->