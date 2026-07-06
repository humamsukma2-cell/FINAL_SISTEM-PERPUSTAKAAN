@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-4">
        <h1>
            <i class="bi bi-speedometer2"></i>
            Dashboard Perpustakaan
        </h1>
        </p>
    </div>

    {{-- Statistik Buku --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Buku</h6>
                        <h2>{{ $totalBuku }}</h2>
                    </div>
                    <i class="bi bi-book-fill text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Buku Tersedia</h6>
                        <h2>{{ $bukuTersedia }}</h2>
                    </div>
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-danger">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Buku Habis</h6>
                        <h2>{{ $bukuHabis }}</h2>
                    </div>
                    <i class="bi bi-x-circle-fill text-danger" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Anggota --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Anggota</h6>
                        <h2>{{ $totalAnggota }}</h2>
                    </div>
                    <i class="bi bi-people-fill text-success" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Anggota Aktif</h6>
                        <h2>{{ $anggotaAktif }}</h2>
                    </div>
                    <i class="bi bi-person-check-fill text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-secondary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Anggota Nonaktif</h6>
                        <h2>{{ $anggotaNonaktif }}</h2>
                    </div>
                    <i class="bi bi-person-x-fill text-secondary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Widget Buku Terlambat --}}
    <div class="card mb-4 border-danger">
        <div class="card-header bg-danger text-white">
            <i class="bi bi-exclamation-triangle"></i>
            Buku Terlambat
        </div>

        <div class="card-body">
            @if ($bukuTerlambat->count() > 0)
                <div class="alert alert-danger">
                    Ada <strong>{{ $bukuTerlambat->count() }}</strong> transaksi peminjaman yang sudah melewati tanggal
                    kembali.
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Anggota</th>
                                <th>Buku</th>
                                <th>Tgl Kembali</th>
                                <th>Terlambat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bukuTerlambat as $trx)
                                <tr>
                                    <td>{{ $trx->kode_transaksi }}</td>
                                    <td>{{ $trx->anggota->nama }}</td>
                                    <td>{{ $trx->buku->judul }}</td>
                                    <td>{{ $trx->tanggal_kembali->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-danger">
                                            Terlambat {{ $trx->terlambat }} hari
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('transaksi.show', $trx->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-success mb-0">
                    <i class="bi bi-check-circle"></i>
                    Tidak ada buku yang terlambat dikembalikan.
                </div>
            @endif
        </div>
    </div>

    {{-- Data Terbaru --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-book"></i>
                    5 Buku Terbaru
                </div>

                <div class="card-body">
                    @forelse ($bukuTerbaru as $buku)
                        <div class="mb-2">
                            <a href="{{ route('buku.show', $buku->id) }}" class="text-decoration-none">
                                <strong>{{ $buku->judul }}</strong>
                            </a>
                            <br>
                            <small class="text-muted">
                                {{ $buku->pengarang }} - {{ $buku->tahun_terbit }}
                            </small>
                        </div>

                        @if (!$loop->last)
                            <hr>
                        @endif
                    @empty
                        <p class="text-muted mb-0">Belum ada data buku.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-people"></i>
                    5 Anggota Terbaru
                </div>

                <div class="card-body">
                    @forelse ($anggotaTerbaru as $anggota)
                        <div class="mb-2">
                            <a href="{{ route('anggota.show', $anggota->id) }}" class="text-decoration-none">
                                <strong>{{ $anggota->nama }}</strong>
                            </a>
                            <br>
                            <small class="text-muted">
                                {{ $anggota->email }} - {{ $anggota->status }}
                            </small>
                        </div>

                        @if (!$loop->last)
                            <hr>
                        @endif
                    @empty
                        <p class="text-muted mb-0">Belum ada data anggota.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Links --}}
    <div class="card">
        <div class="card-header bg-dark text-white">
            <i class="bi bi-link-45deg"></i>
            Quick Links
        </div>

        <div class="card-body">
            <a href="{{ route('buku.index') }}" class="btn btn-primary me-2">
                <i class="bi bi-book"></i>
                Data Buku
            </a>

            <a href="{{ route('anggota.index') }}" class="btn btn-success me-2">
                <i class="bi bi-people"></i>
                Data Anggota
            </a>

            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="bi bi-house-door"></i>
                Home
            </a>
        </div>
    </div>
@endsection
