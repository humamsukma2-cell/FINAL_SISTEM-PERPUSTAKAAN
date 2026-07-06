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
            Detail Transaksi
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4">
        <div class="container">
            <div class="d-flex justify-content-end align-items-center mb-4">

                <a href="<?php echo e(route('transaksi.index')); ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <?php if($transaksi->terlambat > 0): ?>
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle"></i>
                <strong>Peringatan!</strong>

                <?php if($transaksi->status == 'Dipinjam'): ?>
                Buku ini sudah terlambat dikembalikan selama
                <strong><?php echo e($transaksi->terlambat); ?> hari</strong>.
                <?php else: ?>
                Buku ini dikembalikan terlambat selama
                <strong><?php echo e($transaksi->terlambat); ?> hari</strong>.
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                Informasi Transaksi
                            </h5>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Kode Transaksi</th>
                                    <td>
                                        <code><?php echo e($transaksi->kode_transaksi); ?></code>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Nama Anggota</th>
                                    <td><?php echo e($transaksi->anggota->nama); ?></td>
                                </tr>

                                <tr>
                                    <th>Kode Anggota</th>
                                    <td><?php echo e($transaksi->anggota->kode_anggota); ?></td>
                                </tr>

                                <tr>
                                    <th>Judul Buku</th>
                                    <td><?php echo e($transaksi->buku->judul); ?></td>
                                </tr>

                                <tr>
                                    <th>Kode Buku</th>
                                    <td><?php echo e($transaksi->buku->kode_buku); ?></td>
                                </tr>

                                <tr>
                                    <th>Tanggal Pinjam</th>
                                    <td><?php echo e($transaksi->tanggal_pinjam->format('d M Y')); ?></td>
                                </tr>

                                <tr>
                                    <th>Tanggal Kembali</th>
                                    <td><?php echo e($transaksi->tanggal_kembali->format('d M Y')); ?></td>
                                </tr>

                                <tr>
                                    <th>Tanggal Dikembalikan</th>
                                    <td>
                                        <?php if($transaksi->tanggal_dikembalikan): ?>
                                        <?php echo e($transaksi->tanggal_dikembalikan->format('d M Y')); ?>

                                        <?php else: ?>
                                        <span class="text-muted">Belum dikembalikan</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Status</th>
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
                                </tr>

                                <tr>
                                    <th>Denda</th>
                                    <td>
                                        <strong>
                                            Rp <?php echo e(number_format($totalDenda, 0, ',', '.')); ?>

                                        </strong>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Keterangan</th>
                                    <td>
                                        <?php echo e($transaksi->keterangan ?? '-'); ?>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Aksi</h5>
                        </div>

                        <div class="card-body">
                            <?php if($transaksi->status === 'Dipinjam'): ?>
                            <button type="button" class="btn btn-success w-100" id="btn-kembalikan">
                                <i class="bi bi-arrow-return-left"></i>
                                Kembalikan Buku
                            </button>

                            <form id="form-kembalikan"
                                action="<?php echo e(route('transaksi.kembalikan', $transaksi->id)); ?>"
                                method="POST"
                                class="d-none">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                            </form>
                            <?php else: ?>
                            <?php if($transaksi->tanggal_dikembalikan <= $transaksi->tanggal_kembali): ?>
                                <div class="alert alert-success mb-0">
                                    <i class="bi bi-check-circle"></i>
                                    Dikembalikan tepat waktu pada
                                    <?php echo e($transaksi->tanggal_dikembalikan->format('d M Y')); ?>

                                </div>
                                <?php else: ?>
                                <div class="alert alert-warning mb-0">
                                    <i class="bi bi-exclamation-triangle"></i>
                                    Terlambat dikembalikan!<br>
                                    Denda: Rp <?php echo e(number_format($transaksi->denda, 0, ',', '.')); ?>

                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Informasi Denda</h5>
                        </div>

                        <div class="card-body">
                            <p class="mb-1">
                                Denda keterlambatan:
                            </p>

                            <h5>
                                Rp 5.000 / hari
                            </h5>

                            <hr>

                            <?php if($transaksi->terlambat > 0): ?>
                            <p class="mb-1">
                                Terlambat:
                            </p>

                            <h6 class="text-danger">
                                <?php echo e($transaksi->terlambat); ?> hari
                            </h6>
                            <?php endif; ?>

                            <p class="mb-1">
                                Total denda:
                            </p>

                            <h4 class="text-danger">
                                Rp <?php echo e(number_format($totalDenda, 0, ',', '.')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('btn-kembalikan')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi Pengembalian',
                text: 'Apakah Anda yakin ingin mengembalikan buku ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Kembalikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-kembalikan').submit();
                }
            });
        });
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/transaksi/show.blade.php ENDPATH**/ ?>