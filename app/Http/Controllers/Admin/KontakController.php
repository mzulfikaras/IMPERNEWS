<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(){
        $dataKontak = Kontak::latest()->get();
        return view('admin.pages.kontak.index', compact('dataKontak'));
    }

    public function destroy(Kontak $kontak){
        $kontak->delete();
        return redirect()->route('admin.kontak')->with('hapus', 'Data Kontak Berhasil Dihapus');
    }
}
