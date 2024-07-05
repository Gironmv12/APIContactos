<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactosController;


//ruta para obtener todos los contactos usando GET
Route::get('/contactos', [contactosController::class, 'index']);

//ruta para crear un contacto usando POST

Route::post('/contactos', [contactosController::class, 'store']);

//ruta para actualizar un contacto usando PUT

Route::put('/contactos/{id}', [contactosController::class, 'update']);


//ruta para eliminar un contacto usando DELETE

Route::delete('/contactos/{id}', [contactosController::class, 'destroy']);