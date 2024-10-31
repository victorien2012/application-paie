<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/',[AuthController::class, 'handleLogin'])->name('handleLogin');




//route Seécurisé
Route::middleware('auth')->group(function (){

    Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');
});

Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');
Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');


// Route Departements
Route::prefix('departements')->group(function (){

    Route::get('/', [DepartementController::class, 'index'])->name('departement.index');

    Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
    Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');

    //route  pour recuperer l'id de l'élément à modifier
    Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
    //route  pour valider l'id de l'élément modfier
    Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');

    Route::get('/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');
});


// Route Employers
Route::prefix('Employers')->group(function (){

    Route::get('/', [EmployerController::class, 'index'])->name('employer.index');

    Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
    Route::post('/create', [EmployerController::class, 'store'])->name('employer.store');

    //route  pour valider l'id de l'élément modifier
    Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
    //route pour le update
    Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employer.update');

    Route::get('/delete/{employer}', [EmployerController::class, 'delete'])->name('employer.delete');



});

Route ::prefix('configurations')->group(function(){
    Route::get('/',[ConfigurationController::class, 'index'])->name('configuration.index');
    Route::get('/create',[ConfigurationController::class,'create'])->name('configurations.create');

    //routes d'actions
    Route::post('/create', [ConfigurationController::class, 'store'])->name('configurations.store');
    Route::get('/edit/{configuration}', [ConfigurationController::class, 'edit'])->name('configurations.edit');
    Route::put('/update/{configuration}', [ConfigurationController::class, 'update'])->name('configurations.update');
    Route::get('/delete/{configuration}', [ConfigurationController::class, 'delete'])->name('configurations.delete');
});
