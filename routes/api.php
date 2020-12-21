<?php

use App\Http\Controllers\Notes\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notes\NoteController;

Route::namespace('Notes')->group( function(){
    Route::prefix('notes')->group(function(){
        Route::post('create-new-note', [NoteController::class, 'store']);
        Route::get('', [NoteController::class, 'index']);
        Route::get('{note:slug}', [NoteController::class, 'show'])->name('notes.show');
        Route::patch('{note:slug}/edit', [NoteController::class, 'update']);
    });

    Route::prefix('subjects')->group(function(){
        Route::get('', [SubjectController::class, 'index']);
    });
});
