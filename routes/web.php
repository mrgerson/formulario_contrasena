<?php

use App\Http\Controllers\PasswordProposalController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

// Rutas para el concurso de contraseñas
Route::get('/', [PasswordProposalController::class, 'create'])->name('password-proposal.create');
Route::post('/concurso', [PasswordProposalController::class, 'store'])->name('password-proposal.store');

// Rutas administrativas (protegidas con autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/admin/propuestas', [PasswordProposalController::class, 'index'])->name('password-proposal.index');
    Route::get('/admin/propuestas/{passwordProposal}', [PasswordProposalController::class, 'show'])->name('password-proposal.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
