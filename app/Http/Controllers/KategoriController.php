<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori_list = [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku tentang basis data',
                'jumlah_buku' => 18
            ],
            [
                'id' => 3,
                'nama' => 'Web Design',
                'deskripsi' => 'Buku desain tampilan website',
                'jumlah_buku' => 12
            ],
            [
                'id' => 4,
                'nama' => 'Networking',
                'deskripsi' => 'Buku jaringan komputer',
                'jumlah_buku' => 10
            ],
            [
                'id' => 5,
                'nama' => 'Mobile Development',
                'deskripsi' => 'Buku pengembangan aplikasi mobile',
                'jumlah_buku' => 15
            ]
        ];

        return view('kategori.index', compact('kategori_list'));
    }

    public function show($id)
    {
        $kategori_list = [
            1 => [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            2 => [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku tentang basis data',
                'jumlah_buku' => 18
            ],
            3 => [
                'id' => 3,
                'nama' => 'Web Design',
                'deskripsi' => 'Buku desain tampilan website',
                'jumlah_buku' => 12
            ],
            4 => [
                'id' => 4,
                'nama' => 'Networking',
                'deskripsi' => 'Buku jaringan komputer',
                'jumlah_buku' => 10
            ],
            5 => [
                'id' => 5,
                'nama' => 'Mobile Development',
                'deskripsi' => 'Buku pengembangan aplikasi mobile',
                'jumlah_buku' => 15
            ]
        ];

        if (!isset($kategori_list[$id])) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $kategori = $kategori_list[$id];

        $buku_list = [
            [
                'judul' => 'Belajar PHP Dasar',
                'pengarang' => 'Budi Raharjo',
                'tahun' => 2023,
                'stok' => 10
            ],
            [
                'judul' => 'Laravel Framework',
                'pengarang' => 'Andi Nugroho',
                'tahun' => 2024,
                'stok' => 5
            ],
            [
                'judul' => 'JavaScript Modern',
                'pengarang' => 'Siti Aminah',
                'tahun' => 2023,
                'stok' => 8
            ]
        ];

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    public function search($keyword)
    {
        $kategori_list = [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku tentang basis data',
                'jumlah_buku' => 18
            ],
            [
                'id' => 3,
                'nama' => 'Web Design',
                'deskripsi' => 'Buku desain tampilan website',
                'jumlah_buku' => 12
            ],
            [
                'id' => 4,
                'nama' => 'Networking',
                'deskripsi' => 'Buku jaringan komputer',
                'jumlah_buku' => 10
            ],
            [
                'id' => 5,
                'nama' => 'Mobile Development',
                'deskripsi' => 'Buku pengembangan aplikasi mobile',
                'jumlah_buku' => 15
            ]
        ];

        $hasil = [];

        foreach ($kategori_list as $kategori) {
            if (stripos($kategori['nama'], $keyword) !== false) {
                $hasil[] = $kategori;
            }
        }

        return view('kategori.search', compact('hasil', 'keyword'));
    }
}