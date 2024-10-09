<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EmployeeController;




// Route for exporting employees to an Excel file
Route::get('employees/export', [EmployeeController::class, 'export'])->name('employees.export');

// Route for importing employees from an Excel file
Route::post('employees/import', [EmployeeController::class, 'import'])->name('employees.import');

// Resource route for all other CRUD operations
Route::resource('employees', EmployeeController::class)->except(['show']);
