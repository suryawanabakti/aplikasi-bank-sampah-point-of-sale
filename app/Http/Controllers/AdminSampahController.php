<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSampahController extends Controller
{
    public function index()
    {
        $sampah = Sampah::orderBy('created_at', 'desc')->where('status', 'terima')->get();
        return view('admin.sampah.index', compact('sampah'));
    }

    public function sendWa($noWa, $message)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $noWa,
                'message' => $message,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: QepQKjnTC20tMki@kgJs' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }


    public function update(Request $request, Sampah $sampah)
    {
        $valData = $request->validate([
            'harga' => 'required',
            'berat' => 'required'
        ]);
        $user = User::find($sampah->user_id);
        $this->sendWa($user->no_telepon, "Sampah Anda Akan Di Jemput");
        $sampah->update($valData);
        Alert::success("Berhasil", "berhasil update sampah");
        return back();
    }
}
