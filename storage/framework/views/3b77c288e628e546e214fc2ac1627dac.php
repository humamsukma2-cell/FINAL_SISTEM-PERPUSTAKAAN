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
            Daftar Buku
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4">
        <div class="container">
            <div class="d-flex justify-content-end align-items-center mb-4">
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('buku.export')); ?>" class="btn btn-success">
                        <i class="bi bi-download"></i> Export CSV
                    </a>

                    <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Buku
                    </a>
                </div>
            </div>

            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Buku</h6>
                                    <h2 class="mb-0"><?php echo e($totalBuku); ?></h2>
                                </div>

                                <div class="text-primary">
                                    <i class="bi bi-book-fill" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Buku Tersedia</h6>
                                    <h2 class="mb-0"><?php echo e($bukuTersedia); ?></h2>
                                </div>

                                <div class="text-success">
                                    <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-danger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Buku Habis</h6>
                                    <h2 class="mb-0"><?php echo e($bukuHabis); ?></h2>
                                </div>

                                <div class="text-danger">
                                    <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="bi bi-search"></i> Search & Filter Buku
                    </h6>

                    <form action="<?php echo e(route('buku.search')); ?>" method="GET">
                        <div class="row">
                            
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Keyword</label>

                                <input type="text"
                                    name="keyword"
                                    class="form-control"
                                    placeholder="Cari judul, pengarang, atau penerbit"
                                    value="<?php echo e($keyword ?? ''); ?>">
                            </div>

                            
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Kategori</label>

                                <select name="kategori" class="form-select">
                                    <option value="">Semua Kategori</option>

                                    <option value="Programming" <?php echo e(isset($kategori) && $kategori == 'Programming' ? 'selected' : ''); ?>>
                                        Programming
                                    </option>

                                    <option value="Database" <?php echo e(isset($kategori) && $kategori == 'Database' ? 'selected' : ''); ?>>
                                        Database
                                    </option>

                                    <option value="Web Design" <?php echo e(isset($kategori) && $kategori == 'Web Design' ? 'selected' : ''); ?>>
                                        Web Design
                                    </option>

                                    <option value="Networking" <?php echo e(isset($kategori) && $kategori == 'Networking' ? 'selected' : ''); ?>>
                                        Networking
                                    </option>

                                    <option value="Data Science" <?php echo e(isset($kategori) && $kategori == 'Data Science' ? 'selected' : ''); ?>>
                                        Data Science
                                    </option>
                                </select>
                            </div>

                            
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Tahun</label>

                                <select name="tahun" class="form-select">
                                    <option value="">Semua Tahun</option>

                                    <?php $__currentLoopData = $tahunList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemTahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($itemTahun); ?>" <?php echo e(isset($tahun) && $tahun == $itemTahun ? 'selected' : ''); ?>>
                                        <?php echo e($itemTahun); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Ketersediaan</label>

                                <select name="ketersediaan" class="form-select">
                                    <option value="">Semua</option>

                                    <option value="tersedia" <?php echo e(isset($ketersediaan) && $ketersediaan == 'tersedia' ? 'selected' : ''); ?>>
                                        Tersedia
                                    </option>

                                    <option value="habis" <?php echo e(isset($ketersediaan) && $ketersediaan == 'habis' ? 'selected' : ''); ?>>
                                        Habis
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Cari
                            </button>

                            <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-secondary">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="bi bi-funnel"></i> Filter Kategori:
                    </h6>

                    <div class="btn-group" role="group">
                        <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-sm <?php echo e(!isset($kategori) ? 'btn-primary' : 'btn-outline-primary'); ?>">
                            Semua
                        </a>

                        <a href="<?php echo e(route('buku.kategori', 'Programming')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Programming' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                            Programming
                        </a>

                        <a href="<?php echo e(route('buku.kategori', 'Database')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Database' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                            Database
                        </a>

                        <a href="<?php echo e(route('buku.kategori', 'Web Design')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Web Design' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                            Web Design
                        </a>

                        <a href="<?php echo e(route('buku.kategori', 'Networking')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Networking' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                            Networking
                        </a>

                        <a href="<?php echo e(route('buku.kategori', 'Data Science')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Data Science' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                            Data Science
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="card mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" id="select-all" class="form-check-input">

                        <label for="select-all" class="form-check-label">
                            Pilih Semua Buku
                        </label>
                    </div>

                    <form id="bulk-delete-form"
                        action="<?php echo e(route('buku.bulk-delete')); ?>"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku yang dipilih?')">

                        <?php echo csrf_field(); ?>

                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Hapus Terpilih
                        </button>
                    </form>
                </div>
            </div>

            
            <?php $__empty_1 = true; $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if (isset($component)) { $__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959 = $attributes; } ?>
<?php $component = App\View\Components\BukuCard::resolve(['buku' => $buku] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buku-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\BukuCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959)): ?>
<?php $attributes = $__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959; ?>
<?php unset($__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959)): ?>
<?php $component = $__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959; ?>
<?php unset($__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                Tidak ada data buku

                <?php if(isset($kategori)): ?>
                dengan kategori <strong><?php echo e($kategori); ?></strong>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if($bukus->count() > 0): ?>
            <div class="text-center mt-4">
                <p class="text-muted">
                    Menampilkan <?php echo e($bukus->count()); ?> buku

                    <?php if(isset($kategori)): ?>
                    dari kategori <strong><?php echo e($kategori); ?></strong>
                    <?php endif; ?>
                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('form');
                const judul = this.getAttribute('data-judul');

                if (typeof Swal !== 'undefined') {
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
                } else {
                    if (confirm(`Apakah Anda yakin ingin menghapus buku "${judul}"?`)) {
                        form.submit();
                    }
                }
            });
        });

        const selectAll = document.getElementById('select-all');

        if (selectAll) {
            selectAll.addEventListener('change', function() {
                document.querySelectorAll('input[name="buku_ids[]"]').forEach(cb => {
                    cb.checked = this.checked;
                });
            });
        }
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
<?php endif; ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/buku/index.blade.php ENDPATH**/ ?>