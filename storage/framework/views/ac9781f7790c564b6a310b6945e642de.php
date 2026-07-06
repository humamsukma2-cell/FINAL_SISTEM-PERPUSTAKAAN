<div class="card mb-3">
    <div class="card-body">
        
        <div class="form-check mb-2">
            <input type="checkbox"
                name="buku_ids[]"
                value="<?php echo e($buku->id); ?>"
                class="form-check-input buku-checkbox"
                form="bulk-delete-form">

            <label class="form-check-label">
                Pilih buku ini
            </label>
        </div>
        <div class="row">

            
            <div class="col-md-2 text-center">
                <i class="bi bi-book text-primary" style="font-size: 4rem;"></i>

                <div class="mt-2">
                    <?php if($buku->kategori == 'Programming'): ?>
                    <span class="badge bg-primary"><?php echo e($buku->kategori); ?></span>
                    <?php elseif($buku->kategori == 'Database'): ?>
                    <span class="badge bg-success"><?php echo e($buku->kategori); ?></span>
                    <?php elseif($buku->kategori == 'Web Design'): ?>
                    <span class="badge bg-info"><?php echo e($buku->kategori); ?></span>
                    <?php elseif($buku->kategori == 'Networking'): ?>
                    <span class="badge bg-warning"><?php echo e($buku->kategori); ?></span>
                    <?php else: ?>
                    <span class="badge bg-danger"><?php echo e($buku->kategori); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="col-md-7">
                <h5 class="card-title">
                    <?php echo e($buku->judul); ?>

                </h5>

                <p class="card-text text-muted mb-2">
                    <i class="bi bi-person"></i> <?php echo e($buku->pengarang); ?>

                </p>

                <p class="card-text mb-2">
                    <strong>Harga:</strong> <?php echo e($buku->harga_format); ?>

                </p>

                <p class="card-text mb-2">
                    <strong>Stok:</strong> <?php echo e($buku->stok); ?> buku
                </p>

                <p class="card-text">
                    <?php if($buku->stok > 0): ?>
                    <span class="badge bg-success">
                        <i class="bi bi-check-circle"></i> Tersedia
                    </span>
                    <?php else: ?>
                    <span class="badge bg-danger">
                        <i class="bi bi-x-circle"></i> Habis
                    </span>
                    <?php endif; ?>
                </p>
            </div>

            
            <div class="col-md-3 text-end">
                <?php if($showActions): ?>
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('buku.show', $buku->id)); ?>" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-eye"></i> Detail
                    </a>

                    <a href="<?php echo e(route('buku.edit', $buku->id)); ?>" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>

                    
                    <form action="<?php echo e(route('buku.destroy', $buku->id)); ?>"
                        method="POST"
                        class="delete-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="button"
                            class="btn btn-sm btn-danger w-100 btn-delete"
                            data-judul="<?php echo e($buku->judul); ?>">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/components/buku-card.blade.php ENDPATH**/ ?>