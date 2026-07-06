@extends('layouts.app')

@section('title', 'Hasil Pencarian Kategori')

@section('content')
<div class="container">
    <h2>Hasil Pencarian Kategori</h2>

    <div class="alert alert-info">
        Keyword pencarian: <strong>{{ $keyword }}</strong>
    </div>

    @if (count($hasil) > 0)
    <div class="row">
        @foreach ($hasil as $kategori)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $kategori['nama'] }}
                    </h5>

                    <p class="card-text">
                        {{ $kategori['deskripsi'] }}
                    </p>

                    <p>
                        <span class="badge bg-primary">
                            {{ $kategori['jumlah_buku'] }} Buku
                        </span>
                    </p>

                    <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-primary btn-sm">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-warning">
        Kategori dengan keyword "{{ $keyword }}" tidak ditemukan.
    </div>
    @endif
</div>
@endsection