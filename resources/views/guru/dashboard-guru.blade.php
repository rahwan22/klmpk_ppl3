@extends('layout.main')

@section('content')


<p>gggg</p>
<div class="container mt-4">
  <h4>Dashbod Guru</h4>
  <div class="row mt-3">
    <div class="col-md-3">
      <div class="card shadow-sm p-3 text-center">
        <h6>Total Siswa</h6>
        <h3></h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm p-3 text-center">
        <h6>Hadir Hari Ini</h6>
        <h3></h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm p-3 text-center">
        <h6>Izin/Sakit</h6>
        <h3></h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm p-3 text-center">
        <h6>Alpa</h6>
        <h3></h3>
      </div>
    </div>
  </div>
  <div class="mt-4">
    <h5>Grafik Kehadiran Mingguan</h5>
    <canvas id="chartAbsensi"></canvas>
  </div>
</div>
@endsection
