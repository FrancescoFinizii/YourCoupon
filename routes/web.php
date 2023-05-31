<?php

use App\Http\Controllers\AziendaController;
use App\Http\Controllers\OffertaController;
use App\Http\Controllers\UtenteController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/ludovico_routes_web.php';

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
    return view('admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// --Level 0 (public area)

Route::view("/", "level0/home");
Route::view("/login", "level0/login");
Route::view("/registration", "level0/registration");
Route::get('/azienda/{IDAzienda}', [AziendaController::class, 'mostraAzienda'])
    ->name('mostraAzienda');


// --Level 1 (user area)

Route::name('user.')
    ->prefix('user')
    ->middleware(['auth', 'user-access:user'])
    ->group(function () {
        Route::view("/profile", [\App\Http\Controllers\UserController::class, 'index'])->name('profile');
        Route::view("/password", "level1/user-password");
        Route::view("/coupon", "level1/user-coupon");
        Route::get("/coupon/{id}", function($id) {
            return view("level1/coupon", ["id"=>$id]);
        });
    });


// --Level 2 (staff area)
//Route::prefix('staff')->group(function () {
    Route::view("/staffprofile", "level2/profilo_staff");
    Route::view("/staffpassword", "level2/cambia_password");
    Route::view("/gestioneofferte", "level2/user-coupon");
    Route::view("/staffabbinaofferte", "level2/abbina_offerte");
//});

Route::prefix('admin')->group(function () {

    // --Level 3 (admin gestione user area)
    Route::get('/gestione_user', [UtenteController::class, 'showAllUser'])
        ->name('gestione_user');

    Route::get('/gestione_user/{Username}/elimina', [UtenteController::class, 'eliminaUtente'])
        ->name('eliminaUtente');

    // --Level 3 (admin crud staff area)
    Route::get('/crud_staff', [UtenteController::class, 'showAllStaff'])
        ->name('crud_staff');

    Route::get('/newstaff', [UtenteController::class, 'creaStaff'])
        ->name('insertStaff');
    Route::post('/newstaff', [UtenteController::class, 'salvaStaff'])
        ->name('insertStaffSave');

    Route::get('/staff/{Username}/modifica', [UtenteController::class, 'modificaStaff'])
        ->name('modificaStaff');
    Route::post('/staff/{Username}/modifica', [UtenteController::class, 'salvaModificaStaff'])
        ->name('salvaModificaStaff');

    Route::get('/staff/{Username}/elimina', [UtenteController::class, 'eliminaStaff'])
        ->name('eliminaStaff');


    // --Level 3 (admin crud offerte area)
    Route::get('/crud_offerte', [OffertaController::class, 'showAllOfferte'])
        ->name('crud_offerte');

    Route::get('/newoff', [OffertaController::class, 'creaOff'])
        ->name('insertOff');
    Route::post('/newoff', [OffertaController::class, 'salvaOff'])
        ->name('insertOffSave');

    Route::get('/offerta/{IDOfferta}/modifica', [OffertaController::class, 'modificaOff'])
        ->name('modificaOff');
    Route::post('/offerta/{IDOfferta}/modifica', [OffertaController::class, 'salvaModificaOff'])
        ->name('salvaModificaOff');

    Route::get('/offerta/{IDOfferta}/elimina', [OffertaController::class, 'eliminaOfferta'])
        ->name('eliminaOfferta');
});
