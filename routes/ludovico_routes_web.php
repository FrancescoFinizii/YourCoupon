<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudFaqController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CatalogoController;


Route::post('/home', function () {
    echo "hello";
});

/*
Route::view('/crud-faq/newfaq', [CrudFaqController::class, 'insertFaq'])
    ->name('newfaq.insert');*/

/*
Route::get('/crud-faq/newfaq', [CrudFaqController::class, 'insertFaq'])
    ->name('inserimento');

Route::post('/crud-faq/modifyfaq', [CrudFaqController::class, 'modifyFaq'])
    ->name('modifica');*/

Route::view('/statistiche', 'level3.statistics.allstatistics')
    ->name('statistiche');
Route::view('/home', 'layouts.homeAdmin')
    ->name('homeAdmin');


Route::prefix('admin')->middleware('can:isAdmin')->group(function () {

    Route::get('/crud-faq', [CrudFaqController::class, 'showCrud'])
        ->name('crud-faq');

    // --Level 3 (admin gestione faq)
    Route::get('/crud-faq/edit', [CrudFaqController::class, 'insertFaq'])
        ->name('action');

    Route::post('/crud-faq/edit', [CrudFaqController::class, 'modifyFaq'])
        ->name('action');

    Route::post('/crud-faq/edit/newfaq', [CrudFaqController::class, 'storeFaq'])
        ->name('store');

    Route::post('/crud-faq/edit/update', [CrudFaqController::class, 'updateFaq'])
        ->name('update');

    Route::post('/crud-faq/deletefaq', [CrudFaqController::class, 'deleteFaq'])
        ->name('deletefaq');

    Route::get('/crud-faq/eseguita', [CrudFaqController::class, 'eseguita'])
        ->name('eseguita');
});


//rotta chi siamo/about

Route::view('/about', 'level0.about')
    ->name('about');

Route::get('/faq', [FaqController::class, 'showFaq'])
    ->name('faq');

Route::get('/catalogo', [CatalogoController::class, 'index'])
    ->name('catalogo');

Route::get('/catalogoAbbinate', [CatalogoController::class, 'indexPacchetti'])
    ->name('catalogoAbbinate');

Route::get('/catalogoAbbinate/searchAbbinate', [CatalogoController::class, 'searchCatalogoAbbinate'])
    ->name('searchAbbinate');
Route::get('/catalogo/search', [CatalogoController::class, 'searchCatalogo'])
    ->name('search');

Route::get('/offerta/{id}', [CatalogoController::class, 'showOfferta'])
    ->name('offerta');


Route::get('/offertaAbbinata/{id}', [CatalogoController::class, 'showOffertaAbbinata'])
    ->name('offertaAbbinata');

Route::get('/offerta/coupon/{id}', [CatalogoController::class, 'salvaCoupon'])
    ->name('coupon');

Route::get('/couponError', [CatalogoController::class, 'errore'])
    ->name('couponError');




require __DIR__ . '/auth.php';
