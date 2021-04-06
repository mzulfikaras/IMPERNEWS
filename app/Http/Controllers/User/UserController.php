<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Komentar;
use App\Models\Kontak;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $dataBerita = Berita::latest()->paginate(3);
        $dataKategori = KategoriBerita::all();

        return view('user.pages.home.index', compact('dataBerita', 'dataKategori'));
    }

    public function berita(){
        $dataBerita = Berita::latest()->paginate(6);
        $dataKategori = KategoriBerita::all();
        return view('user.pages.berita.berita', compact('dataBerita', 'dataKategori'));
    }

    public function beritaDetails(Berita $berita){
        $dataBerita = Berita::latest()->paginate(3);
        $dataKategori = KategoriBerita::all();
        $jumlahKomentar = Komentar::where('berita_id', $berita->id)->count();
        $dataKomentar = Komentar::where('berita_id', $berita->id)->get();
        return view('user.pages.berita.berita-details', compact('berita', 'dataBerita', 'dataKategori','jumlahKomentar', 'dataKomentar'));
    }

    public function beritaKategori(KategoriBerita $kategori){
        $dataBerita = Berita::where('kategori_id', $kategori->id)->paginate(6);
        $dataKategori = KategoriBerita::all();
        return view('user.pages.berita.berita-kategori', compact('kategori', 'dataBerita', 'dataKategori'));
    }

    public function komentarBerita(Request $request){

        $validateData = $request->validate([
            'berita_id' => 'required',
            'nama_user' => "required",
            'email_user' => 'required',
            'komentar_user' => 'required',
            'komentar_admin' => '',
        ]);

        Komentar::create($validateData);

        $request->session()->flash('pesan', 'Komentar terkirim. Terimakasih Atas Komentar Anda');

        return redirect()->back();
    }

    public function cariBerita(Request $request){
        $judul = $request->judul;

        $dataBerita = Berita::where('judul','like',"%".$judul."%")->paginate(6);
        $dataKategori = KategoriBerita::all();

        return view('user.pages.berita.berita', compact('dataBerita', 'dataKategori'));
    }

    public function kontak(){
        $dataKategori = KategoriBerita::all();
        return view('user.pages.kontak.kontak', compact('dataKategori'));
    }

    public function kontakUser(Request $request){
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'pesan' => 'required'
        ]);

        Kontak::create($validateData);
        $request->session()->flash('pesan', 'Pesan terkirim. Terimakasih Atas Pesan Anda');
        return redirect()->route('user.kontak');
    }


}
