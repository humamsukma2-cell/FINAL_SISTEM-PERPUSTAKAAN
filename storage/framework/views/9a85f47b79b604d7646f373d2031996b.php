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
            Detail Anggota
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4">
        <div class="container">

            
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('dashboard')); ?>" class="text-decoration-none">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('anggota.index')); ?>" class="text-decoration-none">
                                Anggota
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo e($anggota->nama); ?>

                        </li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">
                                <i class="bi bi-person"></i>
                                Detail Anggota
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="text-center mb-4">
                                <?php if($anggota->jenis_kelamin == 'Laki-laki'): ?>
                                <i class="bi bi-person-circle text-primary" style="font-size: 5rem;"></i>
                                <?php else: ?>
                                <i class="bi bi-person-circle text-danger" style="font-size: 5rem;"></i>
                                <?php endif; ?>

                                <h3 class="mt-2"><?php echo e($anggota->nama); ?></h3>

                                <?php if($anggota->status == 'Aktif'): ?>
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle"></i>
                                    Anggota Aktif
                                </span>
                                <?php else: ?>
                                <span class="badge bg-secondary">
                                    <i class="bi bi-x-circle"></i>
                                    Nonaktif
                                </span>
                                <?php endif; ?>
                            </div>

                            <table class="table table-borderless">
                                <tr>
                                    <td width="200" class="fw-bold">
                                        <i class="bi bi-upc text-success"></i>
                                        Kode Anggota
                                    </td>
                                    <td>
                                        : <code><?php echo e($anggota->kode_anggota); ?></code>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-envelope text-success"></i>
                                        Email
                                    </td>
                                    <td>
                                        : <?php echo e($anggota->email); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-telephone text-success"></i>
                                        Telepon
                                    </td>
                                    <td>
                                        : <?php echo e($anggota->telepon); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-geo-alt text-success"></i>
                                        Alamat
                                    </td>
                                    <td>
                                        : <?php echo e($anggota->alamat); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-calendar text-success"></i>
                                        Tanggal Lahir
                                    </td>
                                    <td>
                                        : <?php echo e($anggota->tanggal_lahir->format('d F Y')); ?>

                                        (<?php echo e($anggota->umur); ?> tahun)
                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-gender-ambiguous text-success"></i>
                                        Jenis Kelamin
                                    </td>
                                    <td>
                                        : <?php echo e($anggota->jenis_kelamin); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-briefcase text-success"></i>
                                        Pekerjaan
                                    </td>
                                    <td>
                                        : <?php echo e($anggota->pekerjaan ?? '-'); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">
                                        <i class="bi bi-calendar-check text-success"></i>
                                        Tanggal Daftar
                                    </td>
                                    <td>
                                        : <?php echo e($anggota->tanggal_daftar->format('d F Y')); ?>

                                        (<?php echo e($anggota->lama_anggota); ?> hari)
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-footer text-muted small d-flex justify-content-between">
                            <span>
                                <i class="bi bi-clock"></i>
                                Ditambahkan: <?php echo e($anggota->created_at->format('d M Y H:i')); ?>

                            </span>

                            <span>
                                <i class="bi bi-clock-history"></i>
                                Terakhir Update: <?php echo e($anggota->updated_at->format('d M Y H:i')); ?>

                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header bg-secondary text-white">
                            <h6 class="mb-0">
                                <i class="bi bi-gear"></i>
                                Aksi
                            </h6>
                        </div>

                        <div class="card-body d-grid gap-2">
                            <a href="<?php echo e(route('anggota.edit', $anggota->id)); ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                                Edit Anggota
                            </a>

                            <a href="<?php echo e(route('anggota.index')); ?>" class="btn btn-outline-success">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>

                            <hr>

                            <form action="<?php echo e(route('anggota.destroy', $anggota->id)); ?>"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="bi bi-trash"></i>
                                    Hapus Anggota
                                </button>
                            </form>
                        </div>
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
<?php endif; ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/anggota/show.blade.php ENDPATH**/ ?>