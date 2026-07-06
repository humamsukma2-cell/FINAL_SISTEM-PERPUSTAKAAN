@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('kategori.index') }}">Kategori</a>
            </li>
            <li class="breadcrumb-item active">
                {{ $kategori['nama'] }}
            </li>
        </ol>
    </nav>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $kategori['nama'] }}</h4>
        </div>

        <div class="card-body">
            <p>{{ $kategori['deskripsi'] }}</p>

            <p>
                <strong>Jumlah Buku:</strong>
                {{ $kategori['jumlah_buku'] }}
            </p>
        </div>
    </div>

    <h4>Daftar Buku dalam Kategori Ini</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($buku_list as $index => $buku)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $buku['judul'] }}</td>
                <td>{{ $buku['pengarang'] }}</td>
                <td>{{ $buku['tahun'] }}</td>
                <td>
                    @if ($buku['stok'] > 0)
                    <span class="badge bg-success">{{ $buku['stok'] }}</span>
                    @else
                    <span class="badge bg-danger">Habis</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection