<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatadiriController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('user/tambahUser', [UserController::class, 'tambahUser'])->name('tambahUser');

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('gbt')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
        Route::post('datadiri/importExcelDiri', [DatadiriController::class, 'importExcelDiri'])->name('importExcelDiri');
        Route::resource('datadiri', DatadiriController::class);

        // User
        Route::post('user/importExcelUser', [UserController::class, 'importExcelUser'])->name('importExcelUser');
        Route::resource('user', UserController::class);
    
        // Data Anak
        Route::get('anakExport/{id}', [DatadiriController::class, 'anakExport'])->name('anakExport');
        Route::put('anakUpdate/{id}', [DatadiriController::class, 'anakUpdate'])->name('anakUpdate');
        Route::get('anakEdit/{id}', [DatadiriController::class, 'anakEdit'])->name('anakEdit');
        Route::post('anakStore/{id}', [DatadiriController::class, 'anakStore'])->name('anakStore');
        Route::get('anakCreate/{id}', [DatadiriController::class, 'anakCreate'])->name('anakCreate');
    
        // Dokumen
        Route::get('dokExport/{id}', [DatadiriController::class, 'dokExport'])->name('dokExport');
        Route::put('dokUpdate/{id}', [DatadiriController::class, 'dokUpdate'])->name('dokUpdate');
        Route::get('dokEdit/{id}', [DatadiriController::class, 'dokEdit'])->name('dokEdit');
        Route::post('dokStore/{id}', [DatadiriController::class, 'dokStore'])->name('dokStore');
        Route::get('dokCreate/{id}', [DatadiriController::class, 'dokCreate'])->name('dokCreate');
    
        // Prestasi
        Route::get('presExport/{id}', [DatadiriController::class, 'presExport'])->name('presExport');
        Route::put('presUpdate/{id}', [DatadiriController::class, 'presUpdate'])->name('presUpdate');
        Route::get('presEdit/{id}', [DatadiriController::class, 'presEdit'])->name('presEdit');
        Route::post('presStore/{id}', [DatadiriController::class, 'presStore'])->name('presStore');
        Route::get('presCreate/{id}', [DatadiriController::class, 'presCreate'])->name('presCreate');
    
        // Pendidikan
        Route::get('pendExport/{id}', [DatadiriController::class, 'pendExport'])->name('pendExport');
        Route::put('pendUpdate/{id}', [DatadiriController::class, 'pendUpdate'])->name('pendUpdate');
        Route::get('pendEdit/{id}', [DatadiriController::class, 'pendEdit'])->name('pendEdit');
        Route::post('pendStore/{id}', [DatadiriController::class, 'pendStore'])->name('pendStore');
        Route::get('pendCreate/{id}', [DatadiriController::class, 'pendCreate'])->name('pendCreate');
    
        // Pelayanan
        Route::get('pelayanExport/{id}', [DatadiriController::class, 'pelayanExport'])->name('pelayanExport');
        Route::put('pelayanUpdate/{id}', [DatadiriController::class, 'pelayanUpdate'])->name('pelayanUpdate');
        Route::get('pelayanEdit/{id}', [DatadiriController::class, 'pelayanEdit'])->name('pelayanEdit');
        Route::post('pelayanStore/{id}', [DatadiriController::class, 'pelayanStore'])->name('pelayanStore');
        Route::get('pelayanCreate/{id}', [DatadiriController::class, 'pelayanCreate'])->name('pelayanCreate');
    
        // Pekerjaan
        Route::get('pekerjaExport/{id}', [DatadiriController::class, 'pekerjaExport'])->name('pekerjaExport');
        Route::put('pekerjaUpdate/{id}', [DatadiriController::class, 'pekerjaUpdate'])->name('pekerjaUpdate');
        Route::get('pekerjaEdit/{id}', [DatadiriController::class, 'pekerjaEdit'])->name('pekerjaEdit');
        Route::post('pekerjaStore', [DatadiriController::class, 'pekerjaStore'])->name('pekerjaStore');
        Route::get('pekerjaCreate/{id}', [DatadiriController::class, 'pekerjaCreate'])->name('pekerjaCreate');
    
        // Kepemilikan
        Route::get('kepExport/{id}', [DatadiriController::class, 'kepExport'])->name('kepExport');
        Route::put('kepUpdate/{id}', [DatadiriController::class, 'kepUpdate'])->name('kepUpdate');
        Route::get('kepEdit/{id}', [DatadiriController::class, 'kepEdit'])->name('kepEdit');
        Route::post('kepStore/{id}', [DatadiriController::class, 'kepStore'])->name('kepStore');
        Route::get('kepCreate/{id}', [DatadiriController::class, 'kepCreate'])->name('kepCreate');
    
        // Keluarga
        Route::post('keluarga/importExcelKel', [DatadiriController::class, 'importExcelKel'])->name('importExcelKel');
        Route::get('kelExport/{id}', [DatadiriController::class, 'kelExport'])->name('kelExport');
        Route::put('kelUpdate/{id}', [DatadiriController::class, 'kelUpdate'])->name('kelUpdate');
        Route::get('kelEdit/{id}', [DatadiriController::class, 'kelEdit'])->name('kelEdit');
        Route::post('kelStore/{id}', [DatadiriController::class, 'kelStore'])->name('kelStore');
        Route::get('kelCreate/{id}', [DatadiriController::class, 'kelCreate'])->name('kelCreate');

        // Export Excel
        Route::get('ddexportExcel', [DatadiriController::class, 'ddexportExcel'])->name('ddexportExcel');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
