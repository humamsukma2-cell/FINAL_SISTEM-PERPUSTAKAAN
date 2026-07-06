

<?php $__env->startSection('title', 'Pencarian'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <h2 class="mb-4">
            Hasil Pencarian: "<?php echo e($keyword); ?>"
        </h2>

        <?php
            $highlight = function ($text) use ($keyword) {
                if (!$keyword || !$text) {
                    return e($text ?? '-');
                }

                $safeText = e($text);
                $safeKeyword = e($keyword);

                return preg_replace('/(' . preg_quote($safeKeyword, '/') . ')/i', '<mark>$1</mark>', $safeText);
            };
        ?>

        <?php if(!$keyword): ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                Silakan masukkan kata kunci pencarian.
            </div>
        <?php else: ?>
            <ul class="nav nav-tabs mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab-buku">
                        Buku (<?php echo e($results['buku']->count()); ?>)
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-anggota">
                        Anggota (<?php echo e($results['anggota']->count()); ?>)
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-transaksi">
                        Transaksi (<?php echo e($results['transaksi']->count()); ?>)
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                
                <div class="tab-pane fade show active" id="tab-buku">
                    <?php $__empty_1 = true; $__currentLoopData = $results['buku']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="mb-1">
                                    <?php echo $highlight($buku->judul); ?>

                                </h6>

                                <small class="text-muted">
                                    Kode: <?php echo $highlight($buku->kode_buku); ?> —
                                    Kategori: <?php echo $highlight($buku->kategori); ?> —
                                    Pengarang: <?php echo $highlight($buku->pengarang); ?> —
                                    Penerbit: <?php echo $highlight($buku->penerbit); ?> —
                                    Tahun: <?php echo $highlight($buku->tahun_terbit); ?> —
                                    ISBN: <?php echo $highlight($buku->isbn); ?> —
                                    Bahasa: <?php echo $highlight($buku->bahasa); ?> —
                                    Stok: <?php echo e($buku->stok); ?>

                                </small>

                                <div class="mt-2">
                                    <a href="<?php echo e(route('buku.show', $buku->id)); ?>" class="btn btn-sm btn-primary">
                                        Detail Buku
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted">
                            Tidak ada buku yang cocok.
                        </p>
                    <?php endif; ?>
                </div>

                
                <div class="tab-pane fade" id="tab-anggota">
                    <?php $__empty_1 = true; $__currentLoopData = $results['anggota']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="mb-1">
                                    <?php echo $highlight($anggota->nama); ?>

                                </h6>

                                <small class="text-muted">
                                    Kode: <?php echo $highlight($anggota->kode_anggota); ?> —
                                    Email: <?php echo $highlight($anggota->email); ?> —
                                    Telepon: <?php echo $highlight($anggota->telepon); ?> —
                                    Alamat: <?php echo $highlight($anggota->alamat); ?> —
                                    Pekerjaan: <?php echo $highlight($anggota->pekerjaan ?? '-'); ?> —
                                    Status: <?php echo $highlight($anggota->status); ?>

                                </small>

                                <div class="mt-2">
                                    <a href="<?php echo e(route('anggota.show', $anggota->id)); ?>" class="btn btn-sm btn-success">
                                        Detail Anggota
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted">
                            Tidak ada anggota yang cocok.
                        </p>
                    <?php endif; ?>
                </div>

                
                <div class="tab-pane fade" id="tab-transaksi">
                    <?php $__empty_1 = true; $__currentLoopData = $results['transaksi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="mb-1">
                                    <?php echo $highlight($trx->kode_transaksi); ?>

                                </h6>

                                <small class="text-muted">
                                    Anggota: <?php echo $highlight($trx->anggota->nama); ?> —
                                    Buku: <?php echo $highlight($trx->buku->judul); ?> —
                                    Status: <?php echo $highlight($trx->status); ?> —
                                    Tgl Pinjam: <?php echo e($trx->tanggal_pinjam->format('d/m/Y')); ?> —
                                    Tgl Kembali: <?php echo e($trx->tanggal_kembali->format('d/m/Y')); ?> —
                                    Denda: Rp <?php echo e(number_format($trx->denda, 0, ',', '.')); ?>

                                </small>

                                <div class="mt-2">
                                    <a href="<?php echo e(route('transaksi.show', $trx->id)); ?>"
                                        class="btn btn-sm btn-info text-white">
                                        Detail Transaksi
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted">
                            Tidak ada transaksi yang cocok.
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/search/index.blade.php ENDPATH**/ ?>