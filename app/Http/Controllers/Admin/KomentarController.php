<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function komentar(){
        $dataKomentar = Komentar::all();
        return view('admin.pages.komentarBerita.index', compact('dataKomentar'));
    }

    public function balas(Komentar $komentar){
        return view('admin.pages.komentarBerita.balas', compact('komentar'));
    }

    public function balasKomentar(Request $request, Komentar $komentar){
        $validateData = $request->validate([
            'berita_id' => '',
            'nama_user' => "",
            'email_user' => '',
            'komentar_user' => '',
            'komentar_admin' => 'required',
        ]);

        $komentar->update($validateData);

        $request->session()->flash('pesan', 'Balasan Komentar Berhasil Terkirim');

        return redirect()->route('admin.komentarBerita');
    }

    public function destroy(Komentar $komentar){
        $komentar->delete();
        return redirect()->route('admin.komentarBerita')->with('hapus', 'Komentar Berhasil Di hapus');
    }
}
