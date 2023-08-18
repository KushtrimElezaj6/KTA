<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/',[AnimalController::class, 'index'])->name('animals.index');
    Route::post('/animals',[AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/edit/{animal}',[AnimalController::class, 'edit'])->name('animals.edit');
    Route::patch('/animals/{animal}',[AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animals/{animal}',[AnimalController::class, 'destroy'])->name('animals.destroy');

    Route::get('/',[AnimalTypeController::class , 'index'])->name('animaltype.index');
    Route::post('/animaltype', [AnimalTypeController::class , 'store'])->name('animaltype.story');
    Route::get('/animaltype/edit/{animaltype}', [AnimalTypeController::class , 'edit'])->name('animaltype.edit');
    Route::patch('/animaltype/{animaltype}' , [AnimalTypeController::class , 'update'])->name('animaltype.update');
    Route::delete('/animaltype/{animaltype}', [AnimalTypeController::class , "destroy"])->name('animaltype.destroy');

});
require __DIR__.'/auth.php';
