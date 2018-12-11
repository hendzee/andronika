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
    return view('dashboard.index');
});

Route::resource('employee', 'EmployeeController');
Route::resource('client', 'ClientController');
Route::resource('project', 'ProjectController');

Route::resource('project_payment', 'ProjectPaymentController');
Route::get('project_payment_index/{id}',[
    'uses' => 'ProjectPaymentController@index', 
    'as' => 'project_payment_index']);
Route::get('project_payment_create/{id}', [ 
    'uses' => 'ProjectPaymentController@create', 
    'as' => 'project_payment_create']);

Route::resource('project_supply', 'ProjectSupplyController');
Route::get('project_supply_index/{id}',[
    'uses' => 'ProjectSupplyController@index', 
    'as' => 'project_supply_index']);
Route::get('project_supply_create/{id}', [ 
    'uses' => 'ProjectSupplyController@create', 
    'as' => 'project_supply_create']);

Route::resource('project_purchase', 'ProjectPurchaseController');
Route::get('project_purchase_index/{id}',[
    'uses' => 'ProjectPurchaseController@index', 
    'as' => 'project_purchase_index']);
Route::get('project_purchase_create/{id}', [ 
    'uses' => 'ProjectPurchaseController@create', 
    'as' => 'project_purchase_create']);

Route::resource('project_worker', 'ProjectWorkerController');
Route::get('project_worker_index/{id}',[
    'uses' => 'ProjectWorkerController@index', 
    'as' => 'project_worker_index']);
Route::get('project_worker_create/{id}', [ 
    'uses' => 'ProjectWorkerController@create', 
    'as' => 'project_worker_create']);

Route::resource('worker_salary', 'WorkerSalaryController');
Route::get('worker_salary_index/{id}',[
    'uses' => 'WorkerSalaryController@index', 
    'as' => 'worker_salary_index']);
Route::get('worker_salary_create/{id}', [ 
    'uses' => 'WorkerSalaryController@create', 
    'as' => 'worker_salary_create']);

Route::resource('project_bonus', 'ProjectBonusController');
Route::get('project_bonus_index/{id}',[
    'uses' => 'ProjectBonusController@index', 
    'as' => 'project_bonus_index']);
Route::get('project_bonus_create/{id}', [ 
    'uses' => 'ProjectBonusController@create', 
    'as' => 'project_bonus_create']);

Route::resource('ps_transaction', 'PSTransactionController');
Route::get('ps_transaction_index/{id}',[
    'uses' => 'PSTransactionController@index', 
    'as' => 'ps_transaction_index']);
Route::get('ps_transaction_create/{id}', [ 
    'uses' => 'PSTransactionController@create', 
    'as' => 'ps_transaction_create']);