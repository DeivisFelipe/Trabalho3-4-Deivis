<?php

use Illuminate\Support\Facades\Route;


Route::get('/palavras', 'PalavraController@index');
Route::post('/palavras', 'PalavraController@store');
Route::delete('/palavras/{palavra}', 'PalavraController@destroy');
