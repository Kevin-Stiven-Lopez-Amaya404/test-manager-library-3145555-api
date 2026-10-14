<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
Route::get('/health', fn () => response()->json(['status' => 'ok']));
Route::post('/api/v1/login', [LibraryController::class, 'login']);
Route::middleware('auth.library')->prefix('/api/v1')->group(function () {
    Route::post('/users', [LibraryController::class, 'createLibrarian']);
    Route::get('/categories', [LibraryController::class, 'categories']);
    Route::apiResource('books', LibraryController::class)->only(['index','show','store','update','destroy']);
    Route::post('/books/{book}/cover', [LibraryController::class, 'cover']);
    Route::get('/books/{book}/cover', [LibraryController::class, 'coverFile']);
    Route::get('/members', [LibraryController::class, 'members']);
    Route::get('/members/{member}', [LibraryController::class, 'showMember']);
    Route::post('/members', [LibraryController::class, 'storeMember']);
    Route::post('/loans', [LibraryController::class, 'storeLoan']);
    Route::get('/loans/overdue', [LibraryController::class, 'overdue']);
    Route::get('/loans', [LibraryController::class, 'loans']);
    Route::get('/loans/{loan}', [LibraryController::class, 'loan']);
    Route::post('/loans/{loan}/items/{item}/return', [LibraryController::class, 'returnItem']);
    Route::get('/reports/most-borrowed', [LibraryController::class, 'report']);
});
