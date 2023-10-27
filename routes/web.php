<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminSampahController;
use App\Http\Controllers\AdminSampahMasukController;
use App\Http\Controllers\AdminTabunganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\NasabahSaldoController;
use App\Http\Controllers\NasabahSampahController;
use App\Http\Controllers\ProfileController;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
    // return view('welcome');
});


Route::get('/admin/dashboard', function () {
    $totalNasabah = User::role('nasabah')->count();
    $totalSampah = Sampah::count();
    return view('admin.dashboard', compact('totalNasabah', 'totalSampah'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/nasabah/dashboard', function () {
    $totalSampah = Sampah::where('user_id', auth()->id())->count();

    $totalBerat = Sampah::where('user_id', auth()->id())->where('status', 'terima')->sum('berat');
    return view('nasabah.dashboard', compact('totalSampah', 'totalBerat'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/admin/master-data/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/master-data/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/master-data/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

    Route::get('/admin/master-data/nasabah', [NasabahController::class, 'index'])->name('admin.nasabah.index');
    Route::get('/admin/master-data/nasabah/create', [NasabahController::class, 'create'])->name('admin.nasabah.create');
    Route::get('/admin/master-data/nasabah/{user}', [NasabahController::class, 'show'])->name('admin.nasabah.show');

    Route::get('/admin/sampah-masuk', [AdminSampahMasukController::class, 'index']);
    Route::get('/admin/sampah/{sampah}/terima', [AdminSampahMasukController::class, 'terima']);
    Route::get('/admin/sampah/{sampah}/tolak', [AdminSampahMasukController::class, 'tolak']);


    Route::get('/admin/sampah', [AdminSampahController::class, 'index']);

    Route::put('/admin/sampah/{sampah}', [AdminSampahController::class, 'update']);

    Route::get('/admin/tabungan-sampah', [AdminTabunganController::class, 'index']);
    Route::get('/admin/tabungan-sampah/{user}/ambil', [AdminTabunganController::class, 'ambilSaldo']);



    Route::get('/nasabah/sampah', [NasabahSampahController::class, 'index']);
    Route::post('/nasabah/sampah', [NasabahSampahController::class, 'store']);
    Route::delete('/nasabah/sampah/{sampah}', [NasabahSampahController::class, 'destroy']);


    Route::get('/nasabah/saldo', [NasabahSaldoController::class, 'index']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/laporan/sampah', [LaporanController::class, 'index']);
Route::get('/laporan/sampah/cetak/term/{term}', [LaporanController::class, 'cetak']);
Route::get('/laporan/sampah/cetak/{sampah}', [LaporanController::class, 'cetakPerUser']);

require __DIR__ . '/auth.php';
