<?php

use App\Http\Controllers\AziendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\OffertaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StatisticheController;
use App\Http\Controllers\UtenteController;
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



/*------------------------------------------
---                                      ---
---        All Public Routes List        ---
--                                       ---
--------------------------------------------*/

Route::view('/', "public/home")
    ->name('home');

Route::view('faq', "public/faq")
    ->name('faq');

Route::get('promo', [OffertaController::class, "searchPromo"])
    ->name('promo');

Route::get('promo/{id}', [OffertaController::class, "show"])
    ->name('promo.show');

Route::post("/promo/coupon", [CouponController::class, 'store'])
    ->name('coupon.store')->middleware("can:isClient");

Route::view('about', "public/about")
    ->name('about');

Route::view('register', "public/register")
    ->name('register')->middleware("guest");;

Route::post('register', [ClienteController::class, "store"])
    ->middleware("guest");;

Route::view('login', "public/login")
    ->name('login')->middleware("guest");;

Route::post('login', [UtenteController::class, "authenticate"])
    ->middleware("guest");;

Route::get('/logout', [UtenteController::class, 'logout'])
    ->name('logout')->middleware("auth");;




/*------------------------------------------
---                                      ---
---        All Users Routes List         ---
--                                       ---
--------------------------------------------*/

Route::middleware("can:isClient")->prefix('cliente')->group(function () {

    Route::prefix('edit')->group(function () {

        Route::put("/updateProfile", [ClienteController::class, 'updateProfile'])
            ->name('cliente.update.profile');
        Route::put("/updatePassword", [ClienteController::class, 'updatePassword'])
            ->name('cliente.update.password');
        Route::put("/updateImage", [ClienteController::class, 'updateImage'])
            ->name('cliente.update.image');
        Route::get("/profile", [ClienteController::class, 'editProfile'])
            ->name('cliente.edit.profile');
        Route::get("/password", [ClienteController::class, 'editPassword'])
            ->name('cliente.edit.password');

    });


    Route::get("/coupon", [CouponController::class, 'index'])
        ->name('cliente.coupon');
    Route::get("/coupon/{id}", [CouponController::class, 'show'])
        ->name('coupon.show');

});




/*------------------------------------------
---                                      ---
---        All Staff Routes List         ---
--                                       ---
--------------------------------------------*/

Route::middleware("can:isStaff")->prefix('staff')->group(function () {

    Route::prefix('edit')->group(function () {

        Route::put("/updateProfile", [StaffController::class, 'updateProfile'])
            ->name('staff.update.profile');
        Route::put("/updatePassword", [StaffController::class, 'updatePassword'])
            ->name('staff.update.password');
        Route::get("/profile", [StaffController::class, 'editProfile'])
            ->name('staff.edit.profile');
        Route::get("/password", [StaffController::class, 'editPassword'])
            ->name('staff.edit.password');

    });

    Route::resource('offerta', OffertaController::class)->except("show")->parameters(['offerta' => 'offerta']);;

    Route::post("/offerta/create/step-one", [OffertaController::class, 'stepOne'])
        ->name('offerta.create.step.one');
    Route::post("/offerta/create/azienda", [AziendaController::class, 'search'])
        ->name('azienda.search');
    Route::post("/offerta/create/step-two", [OffertaController::class, 'stepTwo'])
        ->name('offerta.create.step.two');

});



/*------------------------------------------
---                                      ---
---        All Admin Routes List         ---
--                                       ---
--------------------------------------------*/

Route::middleware("can:isAdmin")->prefix("management")->group(function () {

    Route::resource('staff', StaffController::class)->except("show");

    Route::prefix('cliente')->group(function () {
        Route::get('/all', [ClienteController::class, 'index'])
            ->name('cliente.index');
        Route::post('/delete', [ClienteController::class, "deleteSelected"])
            ->name('cliente.delete');
        Route::post('/delete/all', [ClienteController::class, "deleteAll"])
            ->name('cliente.deleteAll');
    });

    Route::resource('azienda', AziendaController::class)->except("show");

    Route::resource('faq', FAQController::class)->except("show");

    Route::prefix("statistiche")->group(function () {
        Route::get('/', [StatisticheController::class, "index"])
            ->name("statistiche.index");
        Route::get('/cliente', [StatisticheController::class, "indexCliente"])
            ->name("statistiche.cliente.index");
        Route::post('/cliente/risultati', [ClienteController::class, "search"])
            ->name("cliente.search");
        Route::post('/cliente/coupon', [StatisticheController::class, "getCouponFromClient"])
            ->name("statistiche.cliente");
        Route::get('/offerta', [StatisticheController::class, "indexOfferta"])
            ->name("statistiche.offerta.index");
        Route::post('/offerta/risultati', [OffertaController::class, "search"])
            ->name("offerta.search");
        Route::post('/offerta/coupon', [StatisticheController::class, "getCouponFromOfferta"])
            ->name("statistiche.offerta");
    });

});

