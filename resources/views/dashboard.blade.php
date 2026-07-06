@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">
        <h2 class="mb-4">Dashboard Perpustakaan</h2>

        {{-- Quick Actions --}}
        <div class="card mb-4">
            <div class="card-header">
                Quick Actions
            </div>

            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('buku.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Buku
                    </a>

                    <a href="{{ route('anggota.create') }}" class="btn btn-success">
                        <i class="bi bi-person-plus"></i>
                        Tambah Anggota
                    </a>

                    <a href="{{ route('transaksi.create') }}" class="btn btn-info text-white">
                        <i class="bi bi-journal-plus"></i>
                        Tambah Transaksi
                    </a>

                    <a href="{{ route('transaksi.laporan') }}" class="btn btn-warning">
                        <i class="bi bi-file-earmark-text"></i>
                        Lihat Laporan
                    </a>
                </div>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="row g-3 mb-4">
            @foreach ([['Total Buku', $stats['total_buku'], 'bi-book', 'primary'], ['Anggota Aktif', $stats['total_anggota'], 'bi-people', 'success'], ['Sedang Dipinjam', $stats['sedang_dipinjam'], 'bi-journal-arrow-up', 'info'], ['Terlambat', $stats['terlambat'], 'bi-exclamation-triangle', 'danger'], ['Transaksi Hari Ini', $stats['transaksi_hari_ini'], 'bi-calendar-check', 'warning'], ['Buku Tersedia', $stats['buku_tersedia'], 'bi-bookshelf', 'secondary'], ['Total Transaksi', $stats['total_transaksi'], 'bi-receipt', 'dark'], ['Denda Bulan Ini', 'Rp ' . number_format($stats['denda_bulan_ini'], 0, ',', '.'), 'bi-cash', 'danger']] as [$label, $value, $icon, $color])
                <div class="col-xl-3 col-md-6">
                    <div class="card border-{{ $color }} h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi {{ $icon }} fs-1 text-{{ $color }} me-3"></i>

                            <div>
                                <h6 class="text-muted mb-1">{{ $label }}</h6>
                                <h4 class="mb-0">{{ $value }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Widget Buku Terlambat --}}
        <div class="card mb-4 border-danger">
            <div class="card-header bg-danger text-white">
                <i class="bi bi-exclamation-triangle"></i>
                Buku Terlambat
            </div>

            <div class="card-body">
                @if ($bukuTerlambat->count() > 0)
                    <div class="alert alert-danger">
                        Ada <strong>{{ $bukuTerlambat->count() }}</strong> transaksi peminjaman yang sudah melewati tanggal
                        kembali.
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Anggota</th>
                                    <th>Buku</th>
                                    <th>Tgl Kembali</th>
                                    <th>Terlambat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($bukuTerlambat as $trx)
                                    <tr>
                                        <td>{{ $trx->kode_transaksi }}</td>
                                        <td>{{ $trx->anggota->nama }}</td>
                                        <td>{{ $trx->buku->judul }}</td>
                                        <td>{{ $trx->tanggal_kembali->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="badge bg-danger">
                                                Terlambat {{ $trx->terlambat }} hari
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('transaksi.show', $trx->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-success mb-0">
                        <i class="bi bi-check-circle"></i>
                        Tidak ada buku yang terlambat dikembalikan.
                    </div>
                @endif
            </div>
        </div>

        {{-- Charts --}}
        <div class="row mb-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Transaksi 6 Bulan Terakhir
                    </div>

                    <div class="card-body">
                        <canvas id="chartTransaksi" height="100"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Top 5 Buku Populer
                    </div>

                    <div class="card-body">
                        <canvas id="chartBuku" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Transactions --}}
        <div class="card">
            <div class="card-header">
                Transaksi Terbaru
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($recentTransaksi as $trx)
                            <tr>
                                <td>{{ $trx->kode_transaksi }}</td>

                                <td>{{ $trx->anggota->nama }}</td>

                                <td>{{ $trx->buku->judul }}</td>

                                <td>{{ $trx->tanggal_pinjam->format('d/m/Y') }}</td>

                                <td>
                                    <span class="badge bg-{{ $trx->status === 'Dipinjam' ? 'warning' : 'success' }}">
                                        {{ $trx->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Line chart — Transaksi 6 bulan terakhir
            new Chart(document.getElementById('chartTransaksi'), {
                type: 'line',
                data: {
                    labels: @json($chartData->pluck('bulan')),
                    datasets: [{
                            label: 'Peminjaman',
                            data: @json($chartData->pluck('pinjam')),
                            borderColor: '#0d6efd',
                            tension: 0.3
                        },
                        {
                            label: 'Pengembalian',
                            data: @json($chartData->pluck('kembali')),
                            borderColor: '#198754',
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true
                }
            });

            // Pie chart — Buku Populer
            new Chart(document.getElementById('chartBuku'), {
                type: 'pie',
                data: {
                    labels: @json($bukuPopuler->pluck('judul')),
                    datasets: [{
                        data: @json($bukuPopuler->pluck('transaksis_count')),
                        backgroundColor: [
                            '#0d6efd',
                            '#198754',
                            '#ffc107',
                            '#dc3545',
                            '#6f42c1'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
