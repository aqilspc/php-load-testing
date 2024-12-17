<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
/*                                                                       *\
|-------------------------------------------------------------------------|
| ============================== Web Routes ==============================|
|-------------------------------------------------------------------------|
*/                                                                         

Route::get('/panel', function () {
    return redirect('login');
});
Route::post('/login_user', [LoginController::class, 'loginUser']);
Route::get('/', [LoginController::class, 'loginPage']);
//login
Auth::routes();

//home 
Route::get('/home', [HomeController::class, 'index']);
//web

