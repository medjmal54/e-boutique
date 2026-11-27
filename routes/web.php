<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])
        ->name('index');

    Route::get('/nouveautes', function () {
        return 'Nos derniers nouveautes';
    })->name('nouveautes');

    Route::get('/{slug}-{id}', [ArticleController::class, 'show'])
        ->where('slug', '[a-z0-9\-]+')
        ->where('id', '[0-9]+')
        ->name('show');

    Route::get('/{categorie}', [ArticleController::class, 'parCategorie'])
        ->where('categorie', '[a-z0-9]+')
        ->name('category');
});
