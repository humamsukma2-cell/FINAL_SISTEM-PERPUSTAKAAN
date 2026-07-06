<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4">
        <h2 class="mb-4">Dashboard Perpustakaan</h2>

        
        <div class="card mb-4">
            <div class="card-header">
                Quick Actions
            </div>

            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Buku
                    </a>

                    <a href="<?php echo e(route('anggota.create')); ?>" class="btn btn-success">
                        <i class="bi bi-person-plus"></i>
                        Tambah Anggota
                    </a>

                    <a href="<?php echo e(route('transaksi.create')); ?>" class="btn btn-info text-white">
                        <i class="bi bi-journal-plus"></i>
                        Tambah Transaksi
                    </a>

                    <a href="<?php echo e(route('transaksi.laporan')); ?>" class="btn btn-warning">
                        <i class="bi bi-file-earmark-text"></i>
                        Lihat Laporan
                    </a>
                </div>
            </div>
        </div>

        
        <div class="row g-3 mb-4">
            <?php $__currentLoopData = [['Total Buku', $stats['total_buku'], 'bi-book', 'primary'], ['Anggota Aktif', $stats['total_anggota'], 'bi-people', 'success'], ['Sedang Dipinjam', $stats['sedang_dipinjam'], 'bi-journal-arrow-up', 'info'], ['Terlambat', $stats['terlambat'], 'bi-exclamation-triangle', 'danger'], ['Transaksi Hari Ini', $stats['transaksi_hari_ini'], 'bi-calendar-check', 'warning'], ['Buku Tersedia', $stats['buku_tersedia'], 'bi-bookshelf', 'secondary'], ['Total Transaksi', $stats['total_transaksi'], 'bi-receipt', 'dark'], ['Denda Bulan Ini', 'Rp ' . number_format($stats['denda_bulan_ini'], 0, ',', '.'), 'bi-cash', 'danger']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value, $icon, $color]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-<?php echo e($color); ?> h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi <?php echo e($icon); ?> fs-1 text-<?php echo e($color); ?> me-3"></i>

                            <div>
                                <h6 class="text-muted mb-1"><?php echo e($label); ?></h6>
                                <h4 class="mb-0"><?php echo e($value); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="card mb-4 border-danger">
            <div class="card-header bg-danger text-white">
                <i class="bi bi-exclamation-triangle"></i>
                Buku Terlambat
            </div>

            <div class="card-body">
                <?php if($bukuTerlambat->count() > 0): ?>
                    <div class="alert alert-danger">
                        Ada <strong><?php echo e($bukuTerlambat->count()); ?></strong> transaksi peminjaman yang sudah melewati tanggal
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
                                <?php $__currentLoopData = $bukuTerlambat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($trx->kode_transaksi); ?></td>
                                        <td><?php echo e($trx->anggota->nama); ?></td>
                                        <td><?php echo e($trx->buku->judul); ?></td>
                                        <td><?php echo e($trx->tanggal_kembali->format('d/m/Y')); ?></td>
                                        <td>
                                            <span class="badge bg-danger">
                                                Terlambat <?php echo e($trx->terlambat); ?> hari
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('transaksi.show', $trx->id)); ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-success mb-0">
                        <i class="bi bi-check-circle"></i>
                        Tidak ada buku yang terlambat dikembalikan.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
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
                        <?php $__currentLoopData = $recentTransaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($trx->kode_transaksi); ?></td>

                                <td><?php echo e($trx->anggota->nama); ?></td>

                                <td><?php echo e($trx->buku->judul); ?></td>

                                <td><?php echo e($trx->tanggal_pinjam->format('d/m/Y')); ?></td>

                                <td>
                                    <span class="badge bg-<?php echo e($trx->status === 'Dipinjam' ? 'warning' : 'success'); ?>">
                                        <?php echo e($trx->status); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Line chart — Transaksi 6 bulan terakhir
            new Chart(document.getElementById('chartTransaksi'), {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($chartData->pluck('bulan'), 15, 512) ?>,
                    datasets: [{
                            label: 'Peminjaman',
                            data: <?php echo json_encode($chartData->pluck('pinjam'), 15, 512) ?>,
                            borderColor: '#0d6efd',
                            tension: 0.3
                        },
                        {
                            label: 'Pengembalian',
                            data: <?php echo json_encode($chartData->pluck('kembali'), 15, 512) ?>,
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
                    labels: <?php echo json_encode($bukuPopuler->pluck('judul'), 15, 512) ?>,
                    datasets: [{
                        data: <?php echo json_encode($bukuPopuler->pluck('transaksis_count'), 15, 512) ?>,
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
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\PERPUSTAKAAN FINAL\resources\views/dashboard.blade.php ENDPATH**/ ?>