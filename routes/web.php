<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::fallback(function () {
    $locale = session()->has('locale') ? session()->get('locale') : config('voyager.multilingual.default');
    app()->setLocale($locale);
    URL::defaults(['locale' => $locale]);
    session()->put('locale', $locale);

    if (in_array(request()->segment(1), config('voyager.multilingual.locales')) && request()->segment(1) !== $locale){
        $segments = str_replace(request()->segment(1),$locale, \url()->previous());
        return redirect()->to($segments);
    }elseif (!in_array(request()->segment(1), config('voyager.multilingual.locales'))) {
        $segments = request()->segments();
        \Illuminate\Support\Arr::prepend($segments, $locale);
        return redirect()->to(implode('/', $segments));
    }else {
        abort(404);
    }
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'kz|en|ru']
], function () {
    Route::get('/setLocale/{lang}', [\App\Http\Controllers\PagesController::class, 'setLocale'])->name('changeLang');

    Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'feedback'])->name('feedback');
    Route::post('/subscribe', [\App\Http\Controllers\FeedbackController::class, 'subscribe'])->name('subscribe');

    Route::match(['post', 'get'], '/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [\App\Http\Controllers\ArticleController::class, 'index'])->name('category');
        Route::get('/{categories}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('category.show');
        Route::get('/{categories}/{article}', [\App\Http\Controllers\ArticleController::class, 'articleShow'])->name('category.show.article');
    });

    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', [\App\Http\Controllers\TagController::class, 'index'])->name('tag');
        Route::get('/{tags}', [\App\Http\Controllers\TagController::class, 'show'])->name('tag.show');
    });

    Route::get('/researches', [\App\Http\Controllers\PagesController::class, 'getResearch'])->name('researches');

    Route::get('/{page?}', [\App\Http\Controllers\PagesController::class, 'getPage'])->name('pages.get');
});
