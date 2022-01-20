<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');

});
// пример написание роутера
Route::get('/1', [UserController::class, 'index']);


// Пример групировки по ссылке
Route::prefix('orders')->group(function ($router) {
    // Переход на тестовую стрницу заходим в контролер
    $router->get('/1', [\App\Http\Controllers\OrderControllers::class,'test'])->name('orders.test');
    // добавление в таблицу данные и задем имя
    $router->get('/add-in-tabl', [\App\Http\Controllers\OrderControllers::class,'addInTabl'])->name('orders.addInTabl');
    // работа с бд
    $router->get('/mysql', [\App\Http\Controllers\OrderControllers::class,'mysql'])->name('orders.mysql');
    // заходим через контролер -> там на вьюшку
    $router->get('/form', [\App\Http\Controllers\OrderControllers::class,'form'])->name('orders.form');
    // работа с параметром постом
    $router->post('/', [\App\Http\Controllers\OrderControllers::class,'store'])->name('orders.store');
    //
    $router->get('/viewmysql', [\App\Http\Controllers\OrderControllers::class,'viewMysql'])->name('orders.viewMysql');
    $router->post('/', [\App\Http\Controllers\OrderControllers::class,'debag'])->name('orders.debag');
});


Route::prefix('status')->group(function ($router) {
    $router->get('/addintabl', [\App\Http\Controllers\StatusController::class,'addInTabl']);
    $router->get('/show', [\App\Http\Controllers\StatusController::class,'show']);
    $router->get('/showtask', [\App\Http\Controllers\StatusController::class,'showTask']);
    $router->get('/showstatus', [\App\Http\Controllers\StatusController::class,'showStatus']);
    $router->get('/showlable', [\App\Http\Controllers\StatusController::class,'showLable']);
});
