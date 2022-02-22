<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;


Route::get('/',[CommentsController::class, 'index'])->name('comment');
Route::post('/',[CommentsController::class, 'store']);

Route::post('/{comment}',[CommentsController::class,'save'])->name('saveedit');
Route::post('/{comment}/delete',[CommentsController::class,'destroy'])->name('delete');
Route::get('/{comment}/edit',[CommentsController::class,'edit'])->name("edit");

