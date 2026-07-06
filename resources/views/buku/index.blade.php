<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Buku
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="d-flex justify-content-end align-items-center mb-4">
                <div class="d-flex gap-2">
                    <a href="{{ route('buku.export') }}" class="btn btn-success">
                        <i class="bi bi-download"></i> Export CSV
                    </a>

                    <a href="{{ route('buku.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Buku
                    </a>
                </div>
            </div>

            {{-- Statistik Cards --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Buku</h6>
                                    <h2 class="mb-0">{{ $totalBuku }}</h2>
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
                                    <h2 class="mb-0">{{ $bukuTersedia }}</h2>
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
                                    <h2 class="mb-0">{{ $bukuHabis }}</h2>
                                </div>

                                <div class="text-danger">
                                    <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Search dan Filter Advanced --}}
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="bi bi-search"></i> Search & Filter Buku
                    </h6>

                    <form action="{{ route('buku.search') }}" method="GET">
                        <div class="row">
                            {{-- Keyword --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Keyword</label>

                                <input type="text"
                                    name="keyword"
                                    class="form-control"
                                    placeholder="Cari judul, pengarang, atau penerbit"
                                    value="{{ $keyword ?? '' }}">
                            </div>

                            {{-- Kategori --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Kategori</label>

                                <select name="kategori" class="form-select">
                                    <option value="">Semua Kategori</option>

                                    <option value="Programming" {{ isset($kategori) && $kategori == 'Programming' ? 'selected' : '' }}>
                                        Programming
                                    </option>

                                    <option value="Database" {{ isset($kategori) && $kategori == 'Database' ? 'selected' : '' }}>
                                        Database
                                    </option>

                                    <option value="Web Design" {{ isset($kategori) && $kategori == 'Web Design' ? 'selected' : '' }}>
                                        Web Design
                                    </option>

                                    <option value="Networking" {{ isset($kategori) && $kategori == 'Networking' ? 'selected' : '' }}>
                                        Networking
                                    </option>

                                    <option value="Data Science" {{ isset($kategori) && $kategori == 'Data Science' ? 'selected' : '' }}>
                                        Data Science
                                    </option>
                                </select>
                            </div>

                            {{-- Tahun --}}
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Tahun</label>

                                <select name="tahun" class="form-select">
                                    <option value="">Semua Tahun</option>

                                    @foreach ($tahunList as $itemTahun)
                                    <option value="{{ $itemTahun }}" {{ isset($tahun) && $tahun == $itemTahun ? 'selected' : '' }}>
                                        {{ $itemTahun }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Ketersediaan --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Ketersediaan</label>

                                <select name="ketersediaan" class="form-select">
                                    <option value="">Semua</option>

                                    <option value="tersedia" {{ isset($ketersediaan) && $ketersediaan == 'tersedia' ? 'selected' : '' }}>
                                        Tersedia
                                    </option>

                                    <option value="habis" {{ isset($ketersediaan) && $ketersediaan == 'habis' ? 'selected' : '' }}>
                                        Habis
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Cari
                            </button>

                            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Filter Kategori --}}
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="bi bi-funnel"></i> Filter Kategori:
                    </h6>

                    <div class="btn-group" role="group">
                        <a href="{{ route('buku.index') }}" class="btn btn-sm {{ !isset($kategori) ? 'btn-primary' : 'btn-outline-primary' }}">
                            Semua
                        </a>

                        <a href="{{ route('buku.kategori', 'Programming') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Programming' ? 'btn-primary' : 'btn-outline-primary' }}">
                            Programming
                        </a>

                        <a href="{{ route('buku.kategori', 'Database') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Database' ? 'btn-primary' : 'btn-outline-primary' }}">
                            Database
                        </a>

                        <a href="{{ route('buku.kategori', 'Web Design') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Web Design' ? 'btn-primary' : 'btn-outline-primary' }}">
                            Web Design
                        </a>

                        <a href="{{ route('buku.kategori', 'Networking') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Networking' ? 'btn-primary' : 'btn-outline-primary' }}">
                            Networking
                        </a>

                        <a href="{{ route('buku.kategori', 'Data Science') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Data Science' ? 'btn-primary' : 'btn-outline-primary' }}">
                            Data Science
                        </a>
                    </div>
                </div>
            </div>

            {{-- Bulk Delete --}}
            <div class="card mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" id="select-all" class="form-check-input">

                        <label for="select-all" class="form-check-label">
                            Pilih Semua Buku
                        </label>
                    </div>

                    <form id="bulk-delete-form"
                        action="{{ route('buku.bulk-delete') }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku yang dipilih?')">

                        @csrf

                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Hapus Terpilih
                        </button>
                    </form>
                </div>
            </div>

            {{-- Daftar Buku --}}
            @forelse ($bukus as $buku)
            <x-buku-card :buku="$buku" />
            @empty
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                Tidak ada data buku

                @isset($kategori)
                dengan kategori <strong>{{ $kategori }}</strong>
                @endisset
            </div>
            @endforelse

            @if ($bukus->count() > 0)
            <div class="text-center mt-4">
                <p class="text-muted">
                    Menampilkan {{ $bukus->count() }} buku

                    @isset($kategori)
                    dari kategori <strong>{{ $kategori }}</strong>
                    @endisset
                </p>
            </div>
            @endif
        </div>
    </div>

    @push('scripts')
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
    @endpush
</x-app-layout>