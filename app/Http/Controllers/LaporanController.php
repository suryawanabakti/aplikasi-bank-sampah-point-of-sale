<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $sampah = Sampah::orderBy('created_at', 'desc')->where('status', 'terima')->whereNotNull('harga')->get();
        return view('laporan.index', compact('sampah'));
    }
    public function cetak()
    {

        $sampah = Sampah::orderBy('created_at', 'desc')->where('status', 'terima')->whereNotNull('harga')->get();

        return view('laporan.cetak', compact('sampah'));
    }
}
