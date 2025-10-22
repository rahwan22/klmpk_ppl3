@extends('layout')

@section('content')
<div class="grid">
  <div class="card">
    <h3>Statistik Harian</h3>
    <table>
      <thead>
        <tr><th>Kelas</th><th>Hadir</th><th>Terlambat</th><th>Izin</th></tr>
      </thead>
      <tbody>
        <tr><td>X IPA 1</td><td>28</td><td>2</td><td>0</td></tr>
        <tr><td>XI IPS 2</td><td>29</td><td>1</td><td>1</td></tr>
        <tr><td>XII RPL 3</td><td>27</td><td>3</td><td>2</td></tr>
      </tbody>
    </table>
  </div>

  <div class="card">
    <h3>Aktivitas Terakhir</h3>
    <ul>
      <li>[09:15] Siswa <b>0001</b> hadir</li>
      <li>[09:10] Siswa <b>0005</b> izin</li>
      <li>[08:55] Data siswa diperbarui</li>
    </ul>
  </div>
</div>
@endsection

