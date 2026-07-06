@extends('layouts.app')

@section('title', 'Daftar Kategori Buku')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Kategori Buku</h2>

    <div class="row">
        @foreach ($kategori_list as $kategori)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $kategori['nama'] }}</h5>

                    <p class="card-text">
                        {{ $kategori['deskripsi'] }}
                    </p>

                    <p>
                        <span class="badge bg-primary">
                            Jumlah Buku: {{ $kategori['jumlah_buku'] }}
                        </span>
                    </p>

                    <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-success btn-sm">
                        Detail Kategori
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection