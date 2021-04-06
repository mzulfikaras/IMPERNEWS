<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(){
        $dataBerita = Berita::latest()->get();
        return view('admin.pages.berita.index', compact('dataBerita'));
    }

    public function create(){
        $kategori = KategoriBerita::all();
        return view('admin.pages.berita.create', compact('kategori'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'kategori_id' => 'required',
            'isi_berita' => 'required',
        ]);

        if ($request->gambar) {
            $validateData['gambar'] = $request->file('gambar')->store('assets/admin/imgberita', 'public');
        }

        Berita::create($validateData);
        $request->session()->flash('pesan', 'Data Berita Berhasil Di Input');
        return redirect()->route('admin.berita.index');
    }

    public function edit(Berita $berita){
        $kategori = KategoriBerita::all();
        return view('admin.pages.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, Berita $berita){
        $beritaId = $berita->find($berita->id);
        $validateData = $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'kategori_id' => 'required',
            'isi_berita' => 'required',
        ]);

        if ($request->gambar) {
            Storage::delete('public/'. $beritaId->gambar);
            $validateData['gambar'] = $request->file('gambar')->store('assets/admin/imgberita','public');
        }

        $berita->update($validateData);
        $request->session()->flash('pesan', 'Data Berita Berhasil Di Update');
        return redirect()->route('admin.berita.index');
    }

    public function destroy(Berita $berita){
        $beritaId = $berita->find($berita->id);

        Storage::delete('public/'.$beritaId->gambar);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('hapus', 'Data Berita Berhasil di Hapus');
    }
}
