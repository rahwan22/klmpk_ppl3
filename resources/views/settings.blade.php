@extends('layout')

@section('content')
<div class="card">
  <h3>Pengaturan Sistem</h3>
  <p class="muted">Ubah informasi dasar sistem absensi.</p>

  <form style="margin-top:12px;">
    <label>Nama Sekolah</label><br>
    <input type="text" value="SMK Negeri 1 Mamuju" style="padding:8px;width:100%;border:1px solid #e6eef7;border-radius:8px;"><br><br>

    <label>Admin Email</label><br>
    <input type="email" value="admin@sekolah.sch.id" style="padding:8px;width:100%;border:1px solid #e6eef7;border-radius:8px;"><br><br>

    <button class="btn">Simpan</button>
  </form>
</div>
@endsection
