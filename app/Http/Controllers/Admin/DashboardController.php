<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Komentar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $jumlahKomentar = Komentar::with([])->count();
        $jumlahBerita = Berita::with([])->count();
        return view('admin.pages.dashboard.index', compact('jumlahKomentar','jumlahBerita'));
    }
}
