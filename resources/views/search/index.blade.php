@extends('layouts.app')

@section('title', 'Pencarian')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">
            Hasil Pencarian: "{{ $keyword }}"
        </h2>

        @php
            $highlight = function ($text) use ($keyword) {
                if (!$keyword || !$text) {
                    return e($text ?? '-');
                }

                $safeText = e($text);
                $safeKeyword = e($keyword);

                return preg_replace('/(' . preg_quote($safeKeyword, '/') . ')/i', '<mark>$1</mark>', $safeText);
            };
        @endphp

        @if (!$keyword)
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                Silakan masukkan kata kunci pencarian.
            </div>
        @else
            <ul class="nav nav-tabs mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab-buku">
                        Buku ({{ $results['buku']->count() }})
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-anggota">
                        Anggota ({{ $results['anggota']->count() }})
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-transaksi">
                        Transaksi ({{ $results['transaksi']->count() }})
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                {{-- Tab Buku --}}
                <div class="tab-pane fade show active" id="tab-buku">
                    @forelse($results['buku'] as $buku)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="mb-1">
                                    {!! $highlight($buku->judul) !!}
                                </h6>

                                <small class="text-muted">
                                    Kode: {!! $highlight($buku->kode_buku) !!} —
                                    Kategori: {!! $highlight($buku->kategori) !!} —
                                    Pengarang: {!! $highlight($buku->pengarang) !!} —
                                    Penerbit: {!! $highlight($buku->penerbit) !!} —
                                    Tahun: {!! $highlight($buku->tahun_terbit) !!} —
                                    ISBN: {!! $highlight($buku->isbn) !!} —
                                    Bahasa: {!! $highlight($buku->bahasa) !!} —
                                    Stok: {{ $buku->stok }}
                                </small>

                                <div class="mt-2">
                                    <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-sm btn-primary">
                                        Detail Buku
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">
                            Tidak ada buku yang cocok.
                        </p>
                    @endforelse
                </div>

                {{-- Tab Anggota --}}
                <div class="tab-pane fade" id="tab-anggota">
                    @forelse($results['anggota'] as $anggota)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="mb-1">
                                    {!! $highlight($anggota->nama) !!}
                                </h6>

                                <small class="text-muted">
                                    Kode: {!! $highlight($anggota->kode_anggota) !!} —
                                    Email: {!! $highlight($anggota->email) !!} —
                                    Telepon: {!! $highlight($anggota->telepon) !!} —
                                    Alamat: {!! $highlight($anggota->alamat) !!} —
                                    Pekerjaan: {!! $highlight($anggota->pekerjaan ?? '-') !!} —
                                    Status: {!! $highlight($anggota->status) !!}
                                </small>

                                <div class="mt-2">
                                    <a href="{{ route('anggota.show', $anggota->id) }}" class="btn btn-sm btn-success">
                                        Detail Anggota
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">
                            Tidak ada anggota yang cocok.
                        </p>
                    @endforelse
                </div>

                {{-- Tab Transaksi --}}
                <div class="tab-pane fade" id="tab-transaksi">
                    @forelse($results['transaksi'] as $trx)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="mb-1">
                                    {!! $highlight($trx->kode_transaksi) !!}
                                </h6>

                                <small class="text-muted">
                                    Anggota: {!! $highlight($trx->anggota->nama) !!} —
                                    Buku: {!! $highlight($trx->buku->judul) !!} —
                                    Status: {!! $highlight($trx->status) !!} —
                                    Tgl Pinjam: {{ $trx->tanggal_pinjam->format('d/m/Y') }} —
                                    Tgl Kembali: {{ $trx->tanggal_kembali->format('d/m/Y') }} —
                                    Denda: Rp {{ number_format($trx->denda, 0, ',', '.') }}
                                </small>

                                <div class="mt-2">
                                    <a href="{{ route('transaksi.show', $trx->id) }}"
                                        class="btn btn-sm btn-info text-white">
                                        Detail Transaksi
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">
                            Tidak ada transaksi yang cocok.
                        </p>
                    @endforelse
                </div>
            </div>
        @endif
    </div>
@endsection
