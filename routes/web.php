<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\DatatablesController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

use App\Models\Office;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Routing\RouteGroup;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

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

Route::group(['middleware'=>'guest'], function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/adminseeder', [LoginController::class, 'adminseeder']);
});


Route::group(['middleware'=>'auth'], function(){

    // PAGES UMUM
    Route::get('/', function () {
        return view('index' , [
            'office' => Office::first()
        ]);
    });

    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

    // USER
    Route::get('/user/export/', [UserController::class, 'export'])->name('user.export');
    Route::resource('user', UserController::class)->middleware('admin');
    Route::get('/userseeder', [UserController::class, 'userseeder']);

    // OFFICE
    Route::get('/office', [OfficeController::class, 'index'])->name('office.index');
    Route::get('/officelist', [OfficeController::class, 'getOfficeData']); 
    Route::post('/editoffice', [OfficeController::class, 'editOfficeData']); 
    
    // JOB
    // Route::get('/job', [JobController::class, 'index']);
    Route::resource('job', JobController::class);
    // Route::get('/joblist', [ActivityController::class, 'getActivityData']); 
    
    // MITRA ROUTE
    Route::resource('mitra', MitraController::class);
    Route::post('/addmitra', [MitraController::class, 'addMitra']); 
    Route::post('/importmitra', [MitraController::class, 'importMitra'])->name('importmitra'); 
    
    // ACTIVITY ROUTE
    Route::resource('activity', ActivityController::class);
    Route::post('/activity', [ActivityController::class, 'customFilter']); 
    Route::get('/activitysearchname', [ActivityController::class, 'searchName'])->name('searchname'); 
    Route::get('/activitysearchjob', [ActivityController::class, 'searchJob'])->name('searchjob'); 
    Route::post('/addActivity', [ActivityController::class, 'addActivity'])->name('addActivity'); 
    Route::post('/activityexport', [ActivityController::class, 'export']);


});








