<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('home');
//     //return redirect('/login');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/perfil', [UserController::class, 'show']);
Route::put('/update_pass', [UserController::class, 'update_pass']);
Route::put('/update_avatar/{id}', [UserController::class, 'update_avatar']);
Route::put('/update_perfil/{id}', [UserController::class, 'update_perfil']);

Route::group(['middleware' => 'accesos'], function () {
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', [MenuController::class, 'index']);
        Route::get('/find', [MenuController::class, 'find']);
        Route::post('/create', [MenuController::class, 'store']);
        Route::get('/edit/{menu}', [MenuController::class, 'edit']);
        Route::put('/update/{menu}', [MenuController::class, 'update']);
        Route::get('/anular/{menu}', [MenuController::class, 'anular']);
        Route::get('/activar/{menu}', [MenuController::class, 'activar']);
        Route::get('/delete/{menu}', [MenuController::class, 'destroy']);

        // rutas para submenu
        Route::get('/add/{menu}', [SubMenuController::class, 'index']);
        Route::get('find_sub', [SubMenuController::class, 'find']);
        Route::post('/add', [SubMenuController::class, 'store']);
        Route::get('/anular_sub/{submenu}', [SubMenuController::class, 'anular']);
        Route::get('/activar_sub/{submenu}', [SubMenuController::class, 'activar']);
        Route::get('/delete_sub/{submenu}', [SubMenuController::class, 'destroy']);
        Route::get('/edit_sub/{submenu}', [SubMenuController::class, 'edit']);
        Route::post('/edit_sub/{submenu}', [SubMenuController::class, 'update']);
    });

    // rutas para roles
    Route::group(['prefix' => 'rol'], function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('/find', [RoleController::class, 'find']);
        Route::get('/create', [RoleController::class, 'create']);
        Route::post('/create', [RoleController::class, 'store']);
        Route::get('/edit/{rol}', [RoleController::class, 'edit']);
        Route::put('/update/{rol}', [RoleController::class, 'update']);
        Route::get('/delete/{rol}', [RoleController::class, 'destroy']);
        Route::get('/anular/{rol}', [RoleController::class, 'anular']);
        Route::get('/activar/{rol}', [RoleController::class, 'activar']);
    });

    // rutas para usuarios
    Route::group(['prefix' => 'usuario'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/find', [UserController::class, 'find']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/edit/{user}', [UserController::class, 'edit']);
        Route::put('/update/{user}', [UserController::class, 'update']);
        Route::get('/delete/{user}', [UserController::class, 'destroy']);
        Route::get('/anular/{user}', [UserController::class, 'anular']);
        Route::get('/activar/{user}', [UserController::class, 'activar']);
    });

    // rutas para estudiantes
    Route::group(['prefix' => 'student'], function () {
        Route::get('/', [StudentController::class, 'list']);
        Route::get('/list', [StudentController::class, 'list']);
        Route::get('/find', [StudentController::class, 'find']);
        Route::get('/create', [StudentController::class, 'create']);
        Route::post('/create', [StudentController::class, 'store']);
        Route::get('/edit/{student}', [StudentController::class, 'edit']);
        Route::put('/update/{student}', [StudentController::class, 'update']);
        Route::get('/delete/{student}', [StudentController::class, 'destroy']);
        Route::get('/assigment/{student}', [StudentController::class, 'assigment']);
        Route::post('/assigment_store', [StudentController::class, 'assigment_store']);
    });

    // rutas para materias
    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', [SubjectController::class, 'list']);
        Route::get('/list', [SubjectController::class, 'list']);
        Route::get('/find', [SubjectController::class, 'find']);
        Route::get('/create', [SubjectController::class, 'create']);
        Route::post('/create', [SubjectController::class, 'store']);
        Route::get('/edit/{subject}', [SubjectController::class, 'edit']);
        Route::put('/update/{subject}', [SubjectController::class, 'update']);
        Route::get('/delete/{subject}', [SubjectController::class, 'destroy']);
    });
});
