<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class NasabahSaldoController extends Controller
{
    public function index()
    {
        $sampah = Sampah::orderBy('created_at', 'desc')->where('status', 'terima')->where('user_id', auth()->id())->get();


        return view('nasabah.saldo.index', compact('sampah'));
    }
}
