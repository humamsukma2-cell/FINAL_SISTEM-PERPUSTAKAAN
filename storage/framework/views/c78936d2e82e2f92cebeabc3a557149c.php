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
            Detail Buku
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4">
        <div class="container">
            <div class="row">
                
                <div class="col-12 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                            </li>

                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('buku.index')); ?>">Buku</a>
                            </li>

                            <li class="breadcrumb-item active"><?php echo e($buku->judul); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">
                                <i class="bi bi-book"></i>
                                Detail Buku
                            </h4>
                        </div>

                        <div class="card-body">
                            
                            <h2 class="mb-3"><?php echo e($buku->judul); ?></h2>

                            
                            <div class="mb-3">
                                <span class="badge bg-<?php echo e($buku->kategori == 'Programming' ? 'primary' : ($buku->kategori == 'Database' ? 'success' : ($buku->kategori == 'Web Design' ? 'info' : ($buku->kategori == 'Networking' ? 'warning' : 'danger')))); ?> fs-6">
                                    <i class="bi bi-tag"></i> <?php echo e($buku->kategori); ?>

                                </span>
                            </div>

                            
                            <table class="table table-borderless">
                                <tr>
                                    <td width="200" class="fw-bold">
                                        <i class="bi bi-upc text-primary"></i> Kode Buku
                                    </td>
                                    <td>: <?php echo e($buku->kode_buku); ?></td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-person text-primary"></i> Pengarang
                                    </td>
                                    <td>: <?php echo e($buku->pengarang); ?></td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-building text-primary"></i> Penerbit
                                    </td>
                                    <td>: <?php echo e($buku->penerbit); ?></td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-calendar text-primary"></i> Tahun Terbit
                                    </td>
                                    <td>: <?php echo e($buku->tahun_terbit); ?></td>
                                </tr>

                                <?php if($buku->isbn): ?>
                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-hash text-primary"></i> ISBN
                                    </td>
                                    <td>: <?php echo e($buku->isbn); ?></td>
                                </tr>
                                <?php endif; ?>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-translate text-primary"></i> Bahasa
                                    </td>
                                    <td>: <?php echo e($buku->bahasa); ?></td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-cash text-primary"></i> Harga
                                    </td>
                                    <td>: <span class="text-success fs-5 fw-bold"><?php echo e($buku->harga_format); ?></span></td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-boxes text-primary"></i> Stok
                                    </td>
                                    <td>
                                        : <span class="fw-bold"><?php echo e($buku->stok); ?></span> buku

                                        <?php if($buku->stok > 0): ?>
                                        <span class="badge bg-success ms-2">
                                            <i class="bi bi-check-circle"></i> Tersedia
                                        </span>
                                        <?php else: ?>
                                        <span class="badge bg-danger ms-2">
                                            <i class="bi bi-x-circle"></i> Habis
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>

                            
                            <?php if($buku->deskripsi): ?>
                            <hr>
                            <h5>
                                <i class="bi bi-file-text text-primary"></i>
                                Deskripsi
                            </h5>
                            <p class="text-justify"><?php echo e($buku->deskripsi); ?></p>
                            <?php else: ?>
                            <hr>
                            <p class="text-muted fst-italic">
                                <i class="bi bi-info-circle"></i>
                                Tidak ada deskripsi untuk buku ini
                            </p>
                            <?php endif; ?>

                            
                            <hr>

                            <div class="row text-muted small">
                                <div class="col-md-6">
                                    <i class="bi bi-clock"></i>
                                    Ditambahkan: <?php echo e($buku->created_at->format('d M Y H:i')); ?>

                                </div>

                                <div class="col-md-6 text-end">
                                    <i class="bi bi-clock-history"></i>
                                    Terakhir Update: <?php echo e($buku->updated_at->format('d M Y H:i')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-4">
                    
                    <div class="card mb-3">
                        <div class="card-header bg-secondary text-white">
                            <h6 class="mb-0">
                                <i class="bi bi-gear"></i> Aksi
                            </h6>
                        </div>

                        <div class="card-body d-grid gap-2">
                            <a href="<?php echo e(route('buku.edit', $buku->id)); ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit Buku
                            </a>

                            <?php if($buku->stok > 0): ?>
                            <button class="btn btn-success">
                                <i class="bi bi-cart-plus"></i> Pinjam Buku
                            </button>
                            <?php else: ?>
                            <button class="btn btn-secondary" disabled>
                                <i class="bi bi-x-circle"></i> Stok Habis
                            </button>
                            <?php endif; ?>

                            <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>

                            <hr>

                            <form action="<?php echo e(route('buku.destroy', $buku->id)); ?>"
                                method="POST"
                                class="delete-form">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="button"
                                    class="btn btn-danger w-100 btn-delete"
                                    data-judul="<?php echo e($buku->judul); ?>">
                                    <i class="bi bi-trash"></i> Hapus Buku
                                </button>
                            </form>
                        </div>
                    </div>

                    
                    <div class="card mb-3">
                        <div class="card-header bg-info text-white">
                            <h6 class="mb-0">
                                <i class="bi bi-info-circle"></i> Status Stok
                            </h6>
                        </div>

                        <div class="card-body">
                            <?php if($buku->stok == 0): ?>
                            <div class="alert alert-danger mb-0">
                                <i class="bi bi-exclamation-triangle"></i>
                                <strong>Stok Habis!</strong><br />
                                Buku ini sedang tidak tersedia.
                            </div>
                            <?php elseif($buku->stok <= 5): ?>
                                <div class="alert alert-warning mb-0">
                                <i class="bi bi-exclamation-circle"></i>
                                <strong>Stok Menipis!</strong><br />
                                Tersisa <?php echo e($buku->stok); ?> buku.
                        </div>
                        <?php else: ?>
                        <div class="alert alert-success mb-0">
                            <i class="bi bi-check-circle"></i>
                            <strong>Stok Aman!</strong><br />
                            Tersedia <?php echo e($buku->stok); ?> buku.
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h6 class="mb-0">
                            <i class="bi bi-collection"></i> Buku Serupa
                        </h6>
                    </div>

                    <div class="card-body">
                        <?php
                        $bukuSerupa = App\Models\Buku::where('kategori', $buku->kategori)
                        ->where('id', '!=', $buku->id)
                        ->take(3)
                        ->get();
                        ?>

                        <?php $__empty_1 = true; $__currentLoopData = $bukuSerupa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="mb-3">
                            <a href="<?php echo e(route('buku.show', $item->id)); ?>" class="text-decoration-none">
                                <h6 class="mb-1"><?php echo e(Str::limit($item->judul, 40)); ?></h6>
                            </a>

                            <small class="text-muted"><?php echo e($item->pengarang); ?></small>
                        </div>

                        <?php if(!$loop->last): ?>
                        <hr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted small mb-0">
                            <i class="bi bi-info-circle"></i>
                            Tidak ada buku serupa
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
        // SweetAlert confirmation untuk delete
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('form');
                const judul = this.getAttribute('data-judul');

                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: `Apakah Anda yakin ingin menghapus buku "${judul}"?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
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
<?php endif; ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/buku/show.blade.php ENDPATH**/ ?>