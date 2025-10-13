@extends('layout')

@section('content')
<div class="card">
  <h3>Data Siswa</h3>
  <div style="margin:12px 0;">
    <button class="btn">Tambah Siswa</button>
  </div>
  <table>
    <thead>
      <tr><th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      <tr><td>1</td><td>0001</td><td>Ahmad</td><td>X IPA 1</td><td><button class="btn ghost">Edit</button></td></tr>
      <tr><td>2</td><td>0002</td><td>Siti</td><td>XI IPS 2</td><td><button class="btn ghost">Edit</button></td></tr>
    </tbody>
  </table>
</div>
@endsection
