<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTabunganController extends Controller
{
    public function index()
    {
        $users = User::role('nasabah')->with('sampah')->orderBy('created_at', 'asc')->get();
        return view('admin.tabungan-sampah.index', compact('users'));
    }
}
