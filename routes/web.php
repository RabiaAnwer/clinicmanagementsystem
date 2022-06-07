<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\TreatmentType;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Inventory;
//use App\Http\Controllers\UserController;
//use App\Http\Controllers\AppointmentController;
//use App\Http\Controllers\UserDetailController;

use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

//Route::get('/phpinfo', function(){
//    print_r(phpinfo());
//});

Route::middleware('auth')->group(function (){

    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
    Route::get('profile', [UserController::class, 'index'])->name('profile.index');

    Route::middleware('hasRole:Doctor,Assistant,Patient')->group(function (){

        Route::get('treatment/{user}',[TreatmentController::class,'show'])->name('treatment.show');
        Route::post('getTreatmentAmount',[TreatmentTypeController::class,'index']);
        Route::get('payment/{user}',[PaymentController::class,'show'])->name('payment.show');
        Route::get('payment/treatment/{treatment}',[PaymentController::class,'specificTreatment'])->name('payment.specific');
    });

    Route::middleware('hasRole:Doctor,Assistant')->group(function (){

        Route::get('view/patient',[UserController::class,'viewPatient'])->name('patient.view');
        Route::post('user',[UserController::class,'store'])->name('user.store');
        Route::post('user/update',[UserController::class,'update'])->name('user.update');
        Route::get('treatment',[TreatmentController::class,'index'])->name('treatment.index');
        Route::get('appointment',[AppointmentController::class,'index'])->name('appointment.index');
        Route::get('payment',[PaymentController::class,'index'])->name('payment.index');
        Route::get('payment/create/{user}',[PaymentController::class,'create'])->name('payment.create');
        Route::post('payment/store',[PaymentController::class,'store'])->name('payment.store');
        Route::get('payment/{payment}/edit',[PaymentController::class,'edit'])->name('payment.edit');
        Route::post('payment/update',[PaymentController::class,'update'])->name('payment.update');
        Route::get('expense',[ExpenseController::class,'index'])->name('expense.index');
        Route::get('expense/create',[ExpenseController::class,'create'])->name('expense.create');
        Route::post('expense/store',[ExpenseController::class,'store'])->name('expense.store');
        Route::get('inventory',[InventoryController::class,'index'])->name('inventory.index');
        Route::get('inventory/{inventory}/edit',[InventoryController::class,'edit'])->name('inventory.edit');
    });

    Route::middleware('hasRole:Doctor')->group(function (){

        Route::get('view/assistant',[UserController::class,'viewAssistant'])->name('assistant.view');
        Route::get('create/assistant',[UserController::class,'createAssistant'])->name('assistant.create');
        Route::get('user/edit/{user}',[UserController::class,'edit'])->name('user.edit');
        Route::get('user/delete/{id}',[UserController::class,'destroy'])->name('user.delete');
        Route::get('treatment/create/{user}',[TreatmentController::class,'create'])->name('treatment.create');
        Route::post('treatment',[TreatmentController::class,'store'])->name('treatment.store');
        Route::get('treatment/delete/{treatment}',[TreatmentController::class,'destroy'])->name('treatment.destroy');
        Route::get('appointment/delete/{appointment}',[AppointmentController::class,'destroy'])->name('appointment.destroy');
        Route::get('payment/delete/{payment}',[PaymentController::class,'destroy'])->name('payment.destroy');
        Route::get('inventory/delete/{inventory}',[InventoryController::class,'destroy'])->name('inventory.destroy');
        Route::get('expense/edit/{expense}',[ExpenseController::class,'edit'])->name('expense.edit');
        Route::post('expense/update',[ExpenseController::class,'update'])->name('expense.update');
        Route::get('expense/delete/{expense}',[ExpenseController::class,'destroy'])->name('expense.destroy');
    });

    Route::middleware('hasRole:Assistant')->group(function (){

        Route::get('create/patient',[UserController::class,'createPatient'])->name('patient.create');
        Route::get('appointment/create',[AppointmentController::class,'create'])->name('appointment.create');
        Route::post('appointment',[AppointmentController::class,'store'])->name('appointment.store');
        Route::get('appointment/{appointment}/edit',[AppointmentController::class,'edit'])->name('appointment.edit');
        Route::post('appointment/update',[AppointmentController::class,'update'])->name('appointment.update');
        Route::get('inventory/create',[InventoryController::class,'create'])->name('inventory.create');
        Route::post('inventory/store',[InventoryController::class,'store'])->name('inventory.store');
        Route::post('inventory/update',[InventoryController::class,'update'])->name('inventory.update');

    });
});


