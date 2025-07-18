@extends('layouts.app')

@section('content')
<!-- Welcome -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6 rounded-lg shadow mb-8">
  <h2 class="text-2xl font-bold">Selamat datang, Faid! 👋</h2>
  <p class="mt-2 text-sm">Berikut adalah ringkasan penggunaan listrik dan tagihan Anda.</p>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
  <div class="bg-white p-5 rounded-lg shadow">
    <p class="text-sm text-gray-500">Total Tagihan Bulan Ini</p>
    <p class="text-2xl font-bold text-red-600 mt-1">Rp 135.000</p>
  </div>
  <div class="bg-white p-5 rounded-lg shadow">
    <p class="text-sm text-gray-500">Status Pembayaran</p>
    <p class="text-2xl font-bold text-green-600 mt-1">Lunas</p>
  </div>
  <div class="bg-white p-5 rounded-lg shadow">
    <p class="text-sm text-gray-500">Penggunaan Listrik</p>
    <p class="text-2xl font-bold mt-1">320 kWh</p>
  </div>
</div>

<!-- Grafik Penggunaan -->
<div class="bg-white rounded-lg shadow p-6 mb-8">
  <h3 class="text-lg font-semibold mb-4">Grafik Penggunaan 6 Bulan Terakhir</h3>
  <canvas id="usageChart" height="100"></canvas>
</div>

<!-- Tabel Riwayat -->
<div class="bg-white rounded-lg shadow p-6">
  <h3 class="text-lg font-semibold mb-4">Riwayat Tagihan</h3>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm border">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 text-left">Bulan</th>
          <th class="px-4 py-2 text-left">Jumlah</th>
          <th class="px-4 py-2 text-left">Status</th>
          <th class="px-4 py-2 text-left">Tanggal Bayar</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        <tr>
          <td class="px-4 py-2">Juli 2025</td>
          <td class="px-4 py-2">Rp 135.000</td>
          <td class="px-4 py-2 text-green-600 font-semibold">Lunas</td>
          <td class="px-4 py-2">17 Juli 2025</td>
        </tr>
        <tr>
          <td class="px-4 py-2">Juni 2025</td>
          <td class="px-4 py-2">Rp 120.000</td>
          <td class="px-4 py-2 text-green-600 font-semibold">Lunas</td>
          <td class="px-4 py-2">17 Juni 2025</td>
        </tr>
        <tr>
          <td class="px-4 py-2">Mei 2025</td>
          <td class="px-4 py-2">Rp 125.000</td>
          <td class="px-4 py-2 text-red-500 font-semibold">Belum Bayar</td>
          <td class="px-4 py-2">-</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Script grafik -->
<script>
  const ctx = document.getElementById('usageChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
      datasets: [{
        label: 'kWh Digunakan',
        data: [290, 310, 280, 320, 300, 330],
        borderColor: '#4F46E5',
        backgroundColor: 'rgba(99, 102, 241, 0.2)',
        borderWidth: 2,
        fill: true,
        tension: 0.4,
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: true }
      },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
</script>
@endsection