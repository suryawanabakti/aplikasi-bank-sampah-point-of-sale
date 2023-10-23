<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\User;
use Alert;
use Illuminate\Http\Request;

class AdminTabunganController extends Controller
{
    public function index()
    {

        $users = User::role('nasabah')->with('sampah')->whereHas('sampah', function ($query) {
            $query->having('nama', '>', 0);
        })->orderBy('created_at', 'asc')->get();
        return view('admin.tabungan-sampah.index', compact('users'));
    }

    public function ambilSaldo(User $user)
    {
        Sampah::where('status', 'terima')->where('user_id', $user->id)->update([
            'nama' => 0,
        ]);

        Alert::success("Berhasil ambil saldo");
        return back();
    }
}
