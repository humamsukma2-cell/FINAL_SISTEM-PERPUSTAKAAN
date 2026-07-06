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
            Daftar Transaksi
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4">
        <div class="container">
            <div class="d-flex justify-content-end align-items-center mb-4">

                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('transaksi.laporan')); ?>" class="btn btn-success">
                        <i class="bi bi-file-earmark-text"></i> Laporan
                    </a>

                    <a href="<?php echo e(route('transaksi.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Pinjam Buku
                    </a>
                </div>
            </div>

            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h6 class="text-muted">Total Transaksi</h6>
                            <h2><?php echo e($transaksis->count()); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <h6 class="text-muted">Sedang Dipinjam</h6>
                            <h2><?php echo e($transaksis->where('status', 'Dipinjam')->count()); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <h6 class="text-muted">Sudah Dikembalikan</h6>
                            <h2><?php echo e($transaksis->where('status', 'Dikembalikan')->count()); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Anggota</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
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
                                        <span class="badge bg-danger mt-1">
                                            Terlambat <?php echo e($transaksi->terlambat); ?> hari
                                        </span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a href="<?php echo e(route('transaksi.show', $transaksi->id)); ?>"
                                            class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        Belum ada transaksi
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/transaksi/index.blade.php ENDPATH**/ ?>