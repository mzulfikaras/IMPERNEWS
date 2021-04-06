<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    public function index(){
        $dataKategori = KategoriBerita::latest()->get();
        return view('admin.pages.kategoriBerita.index', compact('dataKategori'));
    }

    public function create(){
        return view('admin.pages.kategoriBerita.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'kategori' => 'required|string'
        ]);

        KategoriBerita::create($validateData);
        $request->session()->flash('pesan', 'Data Kategori Berita Berhasil Di input');
        return redirect()->route('admin.kategoriBerita.index');
    }

    public function edit(KategoriBerita $kategori){
        return view('admin.pages.kategoriBerita.edit', compact('kategori'));
    }

    public function update(Request $request, KategoriBerita $kategori){
        $validateData = $request->validate([
            'kategori' => 'required|string'
        ]);

        $kategori->update($validateData);
        $request->session()->flash('pesan', 'Data Kategori Berita Berhasil Di Update');
        return redirect()->route('admin.kategoriBerita.index');
    }

    public function destroy(KategoriBerita $kategori){
        $kategori->delete();
        return redirect()->route('admin.kategoriBerita.index')->with('hapus', 'Data Kategori Berita Berhasil Dihapus');
    }
}
