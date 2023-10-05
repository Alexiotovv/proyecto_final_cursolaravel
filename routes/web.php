<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

//CRUD DE MESAS
Route::get('/mesas/index', [MesasController::class, 'index'])->name('mesas.index');
Route::get('/mesas/create', [MesasController::class, 'create'])->name('mesas.create');
Route::get('/mesas/edit/{id}', [MesasController::class, 'edit'])->name('mesas.edit');
Route::post('/mesas/store', [MesasController::class, 'store'])->name('mesas.store');
Route::post('/mesas/update', [MesasController::class, 'update'])->name('mesas.update');

//CRUD DE PLATOS
Route::get('/platos/index', [PlatosController::class, 'index'])->name('platos.index');
Route::get('/platos/create', [PlatosController::class, 'create'])->name('platos.create');
Route::get('/platos/edit/{id}', [PlatosController::class, 'edit'])->name('platos.edit');
Route::post('/platos/store', [PlatosController::class, 'store'])->name('platos.store');
Route::post('/platos/update', [PlatosController::class, 'update'])->name('platos.update');

//PEDIDOS
Route::get('/pedidos/index', [PedidosController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/create/{id}', [PedidosController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos/store', [PedidosController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/show/{idmesa}', [PedidosController::class, 'show'])->name('pedidos.show');


