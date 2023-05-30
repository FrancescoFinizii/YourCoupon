<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudFaqController;
use App\Http\Controllers\CatalogoController;


Route::post('/home', function () {
    echo "hello";
});

Route::get('/crud-faq', [CrudFaqController::class, 'showCrud'])
    ->name('crud-faq');
/*
Route::view('/crud-faq/newfaq', [CrudFaqController::class, 'insertFaq'])
    ->name('newfaq.insert');*/

/*
Route::get('/crud-faq/newfaq', [CrudFaqController::class, 'insertFaq'])
    ->name('inserimento');

Route::post('/crud-faq/modifyfaq', [CrudFaqController::class, 'modifyFaq'])
    ->name('modifica');*/


//rotte crud-faq
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


//rotta chi siamo/about

Route::view('/about', 'level0.about')
    ->name('about');

//rotte catalogo

/*
Route::get('/catalogo', [CrudFaqController::class, 'eseguita'])
    ->name('catalogo');*/
/*
Route::view('/catalogo', 'catalogo.catalogo')
    ->name('catalogo');*/

Route::get('/catalogo', [CatalogoController::class, 'index'])
    ->name('/catalogo');

Route::get('/catalogo/search', [CatalogoController::class, 'searchCatalogo'])
    ->name('search');

Route::get('/offerta/{id}', [CatalogoController::class, 'showOfferta'])
    ->name('offerta');


require __DIR__ . '/auth.php';
