@extends('layout.main')

@section('content')
<div class="container mt-4">
  <h4>Profil Guru</h4>
  <div class="card p-3" style="max-width: 500px;">
    <p><strong>Nama:</strong> {{ $guru->nama_guru }}</p>
    <p><strong>NIP:</strong> {{ $guru->nip }}</p>
    <p><strong>Role:</strong> {{ $guru->role }}</p>
    <p><strong>Username:</strong> {{ $guru->username }}</p>
  </div>
</div>
@endsection
