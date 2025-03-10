<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AlatCampController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ReservationController;

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

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

// Route::post('/login', [AuthController::class,'Auth'])->name('login-post');
// Route::post('/logout', [AuthController::class,'logout'])->name('logout');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register_proses');


// Route::group(['prefix' => 'reser', 'middleware' => ['auth'], 'as' => 'reser'], function () {
//     Route::get('/reservation', [PageController::class, 'reservation'])->name('reservation');
// });
// Route::middleware(['auth'])->group(function () {
//     Route::get('/reservation', [ReservationController::class, 'show'])->name('reservation');
//     Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
//     Route::get('/akun', [UserController::class, 'show'])->name('akun');
// });

// Routes for users
Route::middleware(['auth'])->group(function () {
    Route::get('/reservation', [ReservationController::class, 'showReservationForm'])->name('reservation');
    Route::post('/reservationp', [ReservationController::class, 'submitReservation'])->name('reservation_proses');
    Route::get('/payment', [ReservationController::class, 'payment'])->name('payment');
    Route::post('/payment-process', [ReservationController::class, 'paymentProcess'])->name('payment.process');
    Route::post('/midtrans/callback', [ReservationController::class, 'paymentCallback'])->name('midtrans.callback');
    Route::get('/akun', [AkunController::class, 'show'])->name('akun');
    Route::get('/akun/edit', [AkunController::class, 'edit'])->name('akun.update.view');
    Route::post('/akun/update', [AkunController::class, 'update'])->name('akun.update');
    Route::get('/alat/{id}', [AlatCampController::class, 'show'])->name('alat.show');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::post('/keranjang/hapus', [KeranjangController::class, 'hapusItem'])->name('keranjang.hapus');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::post('/pembayaran-sewa/proses', [PembayaranController::class, 'paymentProcess'])->name('pembayaran.sewa.proses');
    Route::post('/midtrans/callback', [PembayaranController::class, 'paymentCallback'])->name('midtrans.callback');
});
// Routes for admin

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('reservations', [AdminController::class, 'reservations'])->name('admin.reservations');

    Route::resource('alatcamp', AlatCampController::class)->names([
        'index' => 'admin.alatcamp.index',
        'create' => 'admin.alatcamp.create',
        'store' => 'admin.alatcamp.store',
        'show' => 'admin.alatcamp.show',
        'edit' => 'admin.alatcamp.edit',
        'update' => 'admin.alatcamp.update',
        'destroy' => 'admin.alatcamp.destroy',
    ]);
    Route::get('alatcamp/sewa', [AlatCampController::class, 'sewa'])->name('alatcamp.sewa');

    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/pemasukan', [LaporanController::class, 'pemasukan'])->name('laporan.pemasukan');
});


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/maps', [PageController::class, 'maps'])->name('maps');
Route::get('/alatCamp', [PageController::class, 'alatCamp'])->name('alatCamp');
Route::get('/akun', [PageController::class, 'akun'])->name('akun');



Route::get('/akun', [AkunController::class, 'show'])->name('akun')->middleware('auth');
Route::post('/akun', [AkunController::class, 'update'])->name('akun.update')->middleware('auth');


Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');


Route::get('/', function () {
    return view('user.home');
})->name('home');