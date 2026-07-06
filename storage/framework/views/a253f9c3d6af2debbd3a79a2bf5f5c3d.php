<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Transaksi
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4">
        <div class="container">
            <div class="d-flex justify-content-end align-items-center mb-4">

                <a href="<?php echo e(route('transaksi.index')); ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Filter Laporan
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('transaksi.laporan')); ?>" method="GET">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tanggal Dari</label>
                                <input type="date" name="tanggal_dari" class="form-control"
                                    value="<?php echo e(request('tanggal_dari')); ?>">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tanggal Sampai</label>
                                <input type="date" name="tanggal_sampai" class="form-control"
                                    value="<?php echo e(request('tanggal_sampai')); ?>">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">Semua Status</option>
                                    <option value="Dipinjam" <?php echo e(request('status') == 'Dipinjam' ? 'selected' : ''); ?>>
                                        Dipinjam
                                    </option>
                                    <option value="Dikembalikan"
                                        <?php echo e(request('status') == 'Dikembalikan' ? 'selected' : ''); ?>>
                                        Dikembalikan
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Anggota</label>
                                <select name="anggota_id" class="form-select">
                                    <option value="">Semua Anggota</option>

                                    <?php $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($anggota->id); ?>"
                                            <?php echo e(request('anggota_id') == $anggota->id ? 'selected' : ''); ?>>
                                            <?php echo e($anggota->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Filter
                        </button>

                        <a href="<?php echo e(route('transaksi.laporan')); ?>" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Reset
                        </a>

                        <a href="<?php echo e(route('transaksi.laporan.pdf', request()->query())); ?>" class="btn btn-danger">
                            <i class="bi bi-file-earmark-pdf"></i> Export PDF
                        </a>

                        <button type="button" class="btn btn-success" onclick="window.print()">
                            <i class="bi bi-printer"></i>
                            Cetak
                        </button>
                    </form>
                </div>
            </div>

            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h6 class="text-muted">Total Transaksi</h6>
                            <h2><?php echo e($totalTransaksi); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-danger">
                        <div class="card-body">
                            <h6 class="text-muted">Total Denda</h6>
                            <h2>Rp <?php echo e(number_format($totalDenda, 0, ',', '.')); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card">
                <div class="card-header">
                    Data Transaksi
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Anggota</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>

                                        <td>
                                            <code><?php echo e($transaksi->kode_transaksi); ?></code>
                                        </td>

                                        <td><?php echo e($transaksi->anggota->nama); ?></td>

                                        <td><?php echo e($transaksi->buku->judul); ?></td>

                                        <td><?php echo e($transaksi->tanggal_pinjam->format('d M Y')); ?></td>

                                        <td><?php echo e($transaksi->tanggal_kembali->format('d M Y')); ?></td>

                                        <td>
                                            <?php if($transaksi->status == 'Dipinjam'): ?>
                                                <span class="badge bg-warning text-dark">Dipinjam</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Dikembalikan</span>
                                            <?php endif; ?>

                                            <?php if($transaksi->terlambat > 0): ?>
                                                <span class="badge bg-danger">
                                                    Terlambat <?php echo e($transaksi->terlambat); ?> hari
                                                </span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            Rp <?php echo e(number_format($transaksi->denda, 0, ',', '.')); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            Tidak ada data transaksi.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th colspan="7" class="text-end">Total Denda</th>
                                    <th>Rp <?php echo e(number_format($totalDenda, 0, ',', '.')); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media print {

            nav,
            .btn,
            form,
            .alert,
            .no-print {
                display: none !important;
            }
            
            table {
                width: 100% !important;
                border-collapse: collapse !important;
                font-size: 12px;
            }

            table th,
            table td {
                border: 1px solid #000 !important;
                padding: 6px !important;
            }
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\PERPUSTAKAAN FINAL\resources\views/transaksi/laporan.blade.php ENDPATH**/ ?>