<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'Manajemen Siswa & Absensi QR' }}</title>
  <style>
    :root {
      --primary: #2563eb;
      --bg: #f8fafc;
      --card: #ffffff;
      --border: #e6eef7;
      --text: #1e293b;
      --muted: #64748b;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; font-family: "Poppins", sans-serif; }

    body {
      background: var(--bg);
      color: var(--text);
      display: flex;
      min-height: 100vh;
    }

    .app {
      display: flex;
      width: 100%;
    }

    .sidebar {
      width: 250px;
      background: var(--card);
      border-right: 1px solid var(--border);
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .brand {
      font-weight: 700;
      font-size: 20px;
      color: var(--primary);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo {
      width: 38px;
      height: 38px;
      background: var(--primary);
      border-radius: 12px;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
    }

    .nav {
      margin-top: 40px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .nav a {
      text-decoration: none;
      color: var(--text);
      padding: 10px 14px;
      border-radius: 8px;
      transition: 0.2s;
      font-size: 15px;
    }

    .nav a:hover, .nav a.active {
      background: var(--primary);
      color: white;
    }

    .content {
      flex: 1;
      padding: 32px;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 16px 24px;
    }

    .grid {
      display: grid;
      gap: 16px;
    }

    .card {
      background: var(--card);
      border-radius: 16px;
      border: 1px solid var(--border);
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 8px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid var(--border);
      font-size: 14px;
    }

    .btn {
      background: var(--primary);
      color: white;
      padding: 10px 18px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      font-weight: 500;
      font-size: 14px;
    }

    .btn.ghost {
      background: #fff;
      border: 1px solid var(--border);
      color: var(--text);
    }

    .muted {
      color: var(--muted);
      font-size: 14px;
    }

    .footer-small {
      font-size: 13px;
      color: var(--muted);
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div>
        <div class="brand">
          <div class="logo">QR</div>
          Absensi
        </div>
        <nav class="nav">
          <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
          <a href="{{ route('students') }}" class="{{ request()->routeIs('students') ? 'active' : '' }}">Data Siswa</a>
          <a href="{{ route('generate') }}" class="{{ request()->routeIs('generate') ? 'active' : '' }}">Generate QR</a>
          <a href="{{ route('scan') }}" class="{{ request()->routeIs('scan') ? 'active' : '' }}">Scan Absensi</a>
          <a href="{{ route('reports') }}" class="{{ request()->routeIs('reports') ? 'active' : '' }}">Laporan</a>
          <a href="{{ route('settings') }}" class="{{ request()->routeIs('settings') ? 'active' : '' }}">Pengaturan</a>
        </nav>
      </div>
      <div class="footer-small">© 2025 Sistem Absensi QR</div>
    </aside>

    <main class="content">
      <div class="topbar">
        <div>
          <h2>{{ $title ?? '' }}</h2>
          <div class="muted">{{ $subtitle ?? '' }}</div>
        </div>
        <div>
          <input placeholder="Cari data..." style="padding:8px 12px;border:1px solid #e6eef7;border-radius:8px" />
          <button class="btn ghost">Logout</button>
        </div>
      </div>

      @yield('content')
    </main>
  </div>
</body>
</html>
