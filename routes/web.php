<?php

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
    return view('project.index');
});

// Route::get('/project_payment', 'Controller@project_payment');

// Route::get('/project_payment_add', 'Controller@project_payment_add');

// Route::get('/project_payment_edit', 'Controller@project_payment_edit');

// Route::get('/project_supply', function () {
//     return view('project.project_supply');
// });

// Route::get('/project_supply', 'Controller@project_supply');

// Route::get('/project_supply_add', 'Controller@project_supply_add');

// Route::get('/project_supply_edit', 'Controller@project_supply_edit');

// Route::get('/supply_purchase', 'Controller@supply_purchase');

// Route::get('/supply_purchase_add', 'Controller@supply_purchase_add');

// Route::get('/supply_purchase_edit', 'Controller@supply_purchase_edit');

// Route::get('/project_worker', 'Controller@project_worker');

// Route::get('/project_worker_add', 'Controller@project_worker_add');

// Route::get('/project_worker_edit', 'Controller@project_worker_edit');

// Route::resoure('client', 'ClientControllers');

// Route::get('/payment', 'ProjectPaymentController@index');
// Route::get('/project_supply', 'ProjectSupplyController@index');
// Route::get('/project_worker', 'ProjectWorkerController@index');
// Route::get('/project_purchase', 'ProjectPurchaseController@index');

Route::resource('employee', 'EmployeeController');
Route::resource('client', 'ClientController');
Route::resource('project', 'ProjectController');