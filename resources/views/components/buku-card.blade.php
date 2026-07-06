<div class="card mb-3">
    <div class="card-body">
        {{-- Checkbox untuk bulk delete --}}
        <div class="form-check mb-2">
            <input type="checkbox"
                name="buku_ids[]"
                value="{{ $buku->id }}"
                class="form-check-input buku-checkbox"
                form="bulk-delete-form">

            <label class="form-check-label">
                Pilih buku ini
            </label>
        </div>
        <div class="row">

            {{-- Cover / Icon Buku --}}
            <div class="col-md-2 text-center">
                <i class="bi bi-book text-primary" style="font-size: 4rem;"></i>

                <div class="mt-2">
                    @if ($buku->kategori == 'Programming')
                    <span class="badge bg-primary">{{ $buku->kategori }}</span>
                    @elseif ($buku->kategori == 'Database')
                    <span class="badge bg-success">{{ $buku->kategori }}</span>
                    @elseif ($buku->kategori == 'Web Design')
                    <span class="badge bg-info">{{ $buku->kategori }}</span>
                    @elseif ($buku->kategori == 'Networking')
                    <span class="badge bg-warning">{{ $buku->kategori }}</span>
                    @else
                    <span class="badge bg-danger">{{ $buku->kategori }}</span>
                    @endif
                </div>
            </div>

            {{-- Informasi Buku --}}
            <div class="col-md-7">
                <h5 class="card-title">
                    {{ $buku->judul }}
                </h5>

                <p class="card-text text-muted mb-2">
                    <i class="bi bi-person"></i> {{ $buku->pengarang }}
                </p>

                <p class="card-text mb-2">
                    <strong>Harga:</strong> {{ $buku->harga_format }}
                </p>

                <p class="card-text mb-2">
                    <strong>Stok:</strong> {{ $buku->stok }} buku
                </p>

                <p class="card-text">
                    @if ($buku->stok > 0)
                    <span class="badge bg-success">
                        <i class="bi bi-check-circle"></i> Tersedia
                    </span>
                    @else
                    <span class="badge bg-danger">
                        <i class="bi bi-x-circle"></i> Habis
                    </span>
                    @endif
                </p>
            </div>

            {{-- Button Actions --}}
            <div class="col-md-3 text-end">
                @if ($showActions)
                <div class="d-grid gap-2">
                    <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-eye"></i> Detail
                    </a>

                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>

                    {{-- Delete Button --}}
                    <form action="{{ route('buku.destroy', $buku->id) }}"
                        method="POST"
                        class="delete-form">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                            class="btn btn-sm btn-danger w-100 btn-delete"
                            data-judul="{{ $buku->judul }}">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>