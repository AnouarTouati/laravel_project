<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;


Route::get('/',[CommentsController::class, 'index'])->name('comment');
Route::post('/',[CommentsController::class, 'store']);
Route::put('/{comment}',[CommentsController::class,'save'])->name('saveedit');
Route::delete('/{comment}/delete',[CommentsController::class,'destroy'])->name('delete');
Route::post('/{comment}/edit',[CommentsController::class,'edit'])->name("edit");

