<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\PrelimTaburaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DiscountCalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/SAD', function () {
    return view('welcome');
});

// Route::get('/dio', function () {
//     return view('mypages.gallery');
// })->name('gallery');

// Route::get('/index', function () {
//     return view('mypages.index');
// })->name('index');

// Route::get('/services', function () {
//     return view('mypages.services');
// })->name('services');

// Route::get('/tabura', function () {
//     return view('tabura');
// });

Route::get('/discount', [DiscountCalculatorController::class,'index'])->name('discount_calculator');

Route::post('/compute', [DiscountCalculatorController::class,'compute'])->name('compute');

Route::get('/',function(){
    return view('login.login');
})->name('loginDemo');

Route::get('/registerDemo',function(){
    return view('login.register');
})->name('registerDemo');

Route::get('/operator', function(){
    return view('prelim-joshua.operator');
})->name('operator');

Route::get('/addition', [PrelimTaburaController::class,'addPage'])->name('addition');

Route::get('/subtraction', [PrelimTaburaController::class,'subtractPage'])->name('subtraction');

Route::get('/multiplication', [PrelimTaburaController::class,'multiplyPage'])->name('multiplication');

Route::get('/division', [PrelimTaburaController::class,'dividePage'])->name('division');

Route::post('/add' , [PrelimTaburaController::class,'add'])->name('add');
Route::post('/subtract' , [PrelimTaburaController::class,'subtract'])->name('subtract');
Route::post('/multiply' , [PrelimTaburaController::class,'multiply'])->name('multiply');
Route::post('/divide' , [PrelimTaburaController::class,'divide'])->name('divide');


Route::get('/calculator' , [CalculatorController::class,'showCalculatorPage'])->name('calculator');
Route::get('/calculate' , [CalculatorController::class,'calculate'])->name('calculateAnswer');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Admin Route
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/main-dashboard', function () {
            return view('login.dashboard');
        })->name('main-dashboard');

        Route::controller(EventController::class)->group(function(){
            Route::post('add-event','add_event')->name('add_event');
        });
    });

    Route::middleware(['role:registrar'])->prefix('registrar')->name('registrar.')->group(function () {
        Route::get('/main-dashboard', function () {
            return view('login.dashboard');
        })->name('main-dashboard');
    });

    Route::middleware(['role:faculty'])->prefix('faculty')->name('faculty.')->group(function () {
        Route::get('/main-dashboard', function () {
            return view('login.dashboard');
        })->name('main-dashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/showLogin', function(){
    return view("mymiddleware.login");
})->name('login_form');

Route::get('/show-Login', function(){
    return view("mymiddleware.dashboard");
})->name('gotodashboard');

Route::post('/showLogin', function(){
    return view('mymiddleware.login');
})->middleware('login.middleware');




require __DIR__.'/auth.php';
