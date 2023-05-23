<?php

use App\Http\Controllers\AccauntController;
use App\Http\Controllers\AuthRegController;
use Illuminate\Support\Facades\Route;

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

Route::get('/registr', [AuthRegController::class, 'indexRegistr'])->name('registr_form');

Route::get('/', [AuthRegController::class, 'indexLogin'])->name('login_form');

Route::post('/registr', [AuthRegController::class, 'registr'])->name('registr');

Route::post('/login', [AuthRegController::class, 'login'])->name('login_');

Route::middleware('auth')->group(function(){

    Route::get('/accaunt', [AccauntController::class, 'index'])->name('accaunt');

    Route::get('/accaunt/schot', [AccauntController::class, 'create'])->name('otkrit_schot');

    Route::get('/vixod', [AuthRegController::class, 'logout'])->name('vixod');

    Route::post('/accaunt/schot/add', [AccauntController::class, 'add'])->name('add_schot');

    Route::get('/accaunt/schot/delete/{id}', [AccauntController::class, 'destroy'])->name('delete');

    Route::get('/accaunt/schot/snyat_schot/{id}', [AccauntController::class, 'edit'])->name('snyat_schot');

    Route::post('/accaunt/schot/snyat_schot/{id}', [AccauntController::class, 'reStore'])->name('izmenit_schot');

    Route::get('/accaunt/schot/popolnit_schot/{id}', [AccauntController::class, 'editSchot'])->name('edit_schot');

    Route::post('/accaunt/schot/popolnot_schot/{id}', [AccauntController::class, 'popolnitSchot'])->name('popolnit_schot');

    Route::get('/accaunt/schot/convert_schot/{id}', [AccauntController::class, 'convertForm'])->name('convert_summa');

    Route::post('/accaunt/schot/convert_schot/{id}', [AccauntController::class, 'convert'])->name('convert_action');

    Route::get('/accaunt/schot/schoti', [AccauntController::class, 'schotUser'])->name('schot');

    Route::get('/accaunt/schot/schoti/perevod', [AccauntController::class, 'perevod'])->name('perevod_summa');

    Route::post('/accaunt/schot/schoti/action', [AccauntController::class, 'actionToOrder'])->name('action_order');

    Route::post('/accaunt/schot/schoti/perevod/{id}', [AccauntController::class, 'perevodSum'])->name('perevod_to_user');
});


