@extends('layout.main')

@section('content')
<div class="container mt-4">
  <h4 class="mb-4">Data Absensi Siswa</h4>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-primary text-center">
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>Tanggal</th>
              <th>Jam</th>
              <th>Status</th>
              <th>Sumber</th>
              <th>Lokasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>2200112233</td>
              <td>Andi Pratama</td>
              <td>2025-10-25</td>
              <td>07:15</td>
              <td><span class="badge bg-success">Hadir</span></td>
              <td><span class="badge bg-light text-dark border">Scan</span></td>
              <td>SMAN 1 Polewali</td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>2200112244</td>
              <td>Siti Rahma</td>
              <td>2025-10-25</td>
              <td>07:40</td>
              <td><span class="badge bg-warning text-dark">Terlambat</span></td>
              <td><span class="badge bg-light text-dark border">Scan</span></td>
              <td>Gerbang Utama Sekolah</td>
            </tr>
            <tr>
              <td class="text-center">3</td>
              <td>2200112255</td>
              <td>Budi Santoso</td>
              <td>2025-10-25</td>
              <td>-</td>
              <td><span class="badge bg-info text-dark">Izin</span></td>
              <td><span class="badge bg-light text-dark border">Manual</span></td>
              <td>-</td>
            </tr>
            <tr>
              <td class="text-center">4</td>
              <td>2200112266</td>
              <td>Lina Marlina</td>
              <td>2025-10-25</td>
              <td>-</td>
              <td><span class="badge bg-secondary">Sakit</span></td>
              <td><span class="badge bg-light text-dark border">Manual</span></td>
              <td>-</td>
            </tr>
            <tr>
              <td class="text-center">5</td>
              <td>2200112277</td>
              <td>Rahman</td>
              <td>2025-10-25</td>
              <td>-</td>
              <td><span class="badge bg-danger">Alpa</span></td>
              <td><span class="badge bg-light text-dark border">Scan</span></td>
              <td>-</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
