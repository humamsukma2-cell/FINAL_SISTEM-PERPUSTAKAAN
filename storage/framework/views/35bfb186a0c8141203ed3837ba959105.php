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
            Daftar Anggota
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-4">
        <div class="container">
            <div class="d-flex justify-content-end align-items-center mb-4">
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('anggota.export')); ?>" class="btn btn-success">
                        <i class="bi bi-file-excel"></i> Export Excel
                    </a>

                    <a href="<?php echo e(route('anggota.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Anggota
                    </a>
                </div>
            </div>

            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Total Anggota</h6>
                                    <h2><?php echo e($totalAnggota); ?></h2>
                                </div>
                                <i class="bi bi-people-fill text-success" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Anggota Aktif</h6>
                                    <h2><?php echo e($anggotaAktif); ?></h2>
                                </div>
                                <i class="bi bi-person-check-fill text-primary" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Anggota Nonaktif</h6>
                                    <h2><?php echo e($anggotaNonaktif); ?></h2>
                                </div>
                                <i class="bi bi-person-x-fill text-secondary" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="<?php echo e(route('anggota.search')); ?>" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="keyword" class="form-control"
                            placeholder="Cari nama/email/telepon">
                    </div>

                    <div class="col-md-2">
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">Semua Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select name="pekerjaan" class="form-select">
                            <option value="">Semua Pekerjaan</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Pegawai">Pegawai</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>

                        <a href="<?php echo e(route('anggota.index')); ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </a>
                    </div>
                </div>
            </form>

            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>

                                    <td>
                                        <code><?php echo e($anggota->kode_anggota); ?></code>
                                    </td>

                                    <td>
                                        <strong><?php echo e($anggota->nama); ?></strong>
                                    </td>

                                    <td>
                                        <i class="bi bi-envelope"></i>
                                        <?php echo e($anggota->email); ?>

                                    </td>

                                    <td>
                                        <i class="bi bi-telephone"></i>
                                        <?php echo e($anggota->telepon); ?>

                                    </td>

                                    <td>
                                        <?php if($anggota->jenis_kelamin == 'Laki-laki'): ?>
                                        <i class="bi bi-gender-male text-primary"></i>
                                        <?php else: ?>
                                        <i class="bi bi-gender-female text-danger"></i>
                                        <?php endif; ?>

                                        <?php echo e($anggota->jenis_kelamin); ?>

                                    </td>

                                    <td>
                                        <?php if($anggota->status == 'Aktif'): ?>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Aktif
                                        </span>
                                        <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle"></i> Nonaktif
                                        </span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('anggota.show', $anggota->id)); ?>"
                                                class="btn btn-sm btn-info text-white"
                                                title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="<?php echo e(route('anggota.edit', $anggota->id)); ?>"
                                                class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="<?php echo e(route('anggota.destroy', $anggota->id)); ?>"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota <?php echo e($anggota->nama); ?>?')">

                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        <i class="bi bi-inbox"></i>
                                        Tidak ada data anggota
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
<?php endif; ?><?php /**PATH D:\KULIAH\SEMESTER 4\Laravel\perpustakaan FIX\resources\views/anggota/index.blade.php ENDPATH**/ ?>