<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Transaksi;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('q');

        $results = [
            'buku' => collect(),
            'anggota' => collect(),
            'transaksi' => collect(),
        ];

        if ($keyword) {
            $results['buku'] = Buku::where('judul', 'LIKE', "%{$keyword}%")
                ->orWhere('pengarang', 'LIKE', "%{$keyword}%")
                ->orWhere('penerbit', 'LIKE', "%{$keyword}%")
                ->orWhere('isbn', 'LIKE', "%{$keyword}%")
                ->orWhere('kode_buku', 'LIKE', "%{$keyword}%")
                ->get();

            $results['anggota'] = Anggota::where('nama', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%")
                ->orWhere('kode_anggota', 'LIKE', "%{$keyword}%")
                ->orWhere('telepon', 'LIKE', "%{$keyword}%")
                ->orWhere('alamat', 'LIKE', "%{$keyword}%")
                ->get();

            $results['transaksi'] = Transaksi::with(['anggota', 'buku'])
                ->where('kode_transaksi', 'LIKE', "%{$keyword}%")
                ->orWhereHas('anggota', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE', "%{$keyword}%");
                })
                ->orWhereHas('buku', function ($query) use ($keyword) {
                    $query->where('judul', 'LIKE', "%{$keyword}%");
                })
                ->get();
        }

        return view('search.index', compact('keyword', 'results'));
    }
}
