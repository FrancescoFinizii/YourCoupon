<?php

use App\Http\Controllers\AziendaController;
use App\Http\Controllers\OffertaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticController;

require __DIR__ . '/ludovico_routes_web.php';

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

require __DIR__ . '/auth.php';

// --Level 0 (public area)

Route::view("/", "level0/home");
Route::get('/azienda/{IDAzienda}', [AziendaController::class, 'mostraAzienda'])
    ->name('mostraAzienda');


// --Level 1 (user area)

/*Route::prefix('user')->group(function () {
    Route::view("/profile", "level1/user-information");
    Route::view("/password", "level1/user-password");
    Route::view("/coupon", "level1/user-coupon");
    Route::get("/coupon/{id}", function($id) {
        return view("level1/coupon", ["id"=>$id]);
    });
});*/

// --Level 1 (user area)

Route::prefix('user/{username}')->group(function () {
    Route::prefix('/edit')->group(function () {
        Route::put("/updateProfile", [UserController::class, 'updateProfile'])
            ->name('userProfileUpdate');
        Route::put("/updatePassword", [UserController::class, 'updatePassword'])
            ->name('userPasswordUpdate');
        Route::get("/profile", [UserController::class, 'editProfile'])
            ->name('userProfile');
        Route::get("/password", [UserController::class, 'editPassword'])
            ->name('userPassword');
    });
});

// --Level 2 (staff area)
Route::prefix('staff/{username}')->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::put("/update", [StaffController::class, 'updateProfile'])
            ->name('staffProfileUpdate');
        Route::get("/edit", [StaffController::class, 'editProfile'])
            ->name('staffProfile');
    });
    Route::prefix('/password')->group(function () {
        Route::put("update", [StaffController::class, 'updatePassword'])
            ->name('staffPasswordUpdate');
        Route::get("/edit", [StaffController::class, 'editPassword'])
            ->name('staffPassword');
    });
    Route::prefix('offerte')->group(function () {
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

});
Route::get("/example", [StatisticController::class, "getTotCoupon"]);
Route::get("/example2/{username}", [StatisticController::class, "getCouponFromUser"]);
Route::get("/example3/{IDOfferta}", [StatisticController::class, "getCouponFromOfferta"]);

Route::prefix('admin')->group(function () {

    // --Level 3 (admin gestione user area)
    Route::get('/gestione_user', [AdminController::class, 'showAllUser'])
        ->name('gestione_user');

    Route::get('/gestione_user/{username}/elimina', [AdminController::class, 'eliminaUtente'])
        ->name('eliminaUtente');

    // --Level 3 (admin crud staff area)
    Route::get('/crud_staff', [AdminController::class, 'showAllStaff'])
        ->name('crud_staff');

    Route::get('/newstaff', [AdminController::class, 'creaStaff'])
        ->name('insertStaff');
    Route::post('/newstaff', [AdminController::class, 'salvaStaff'])
        ->name('insertStaffSave');

    Route::get('/staff/{username}/modifica', [AdminController::class, 'modificaStaff'])
        ->name('modificaStaff');
    Route::post('/staff/{username}/modifica', [AdminController::class, 'salvaModificaStaff'])
        ->name('salvaModificaStaff');

    Route::get('/staff/{username}/elimina', [AdminController::class, 'eliminaStaff'])
        ->name('eliminaStaff');
});



