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
    Route::group(['middleware' => [
        'role:SUPER_ADMIN|ADMIN'
        ]], function(){
        Route::get('/', 'DashboardController@index');

        Route::resource('dashboard', 'DashboardController');

        Route::resource('client', 'ClientController');
        Route::resource('project', 'ProjectController');
        Route::get('project_update_status/{status}/{id}', [
            'uses' => 'ProjectController@updateStatus',
            'as' => 'project_update_status']);

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
        Route::get('project_bonus_index/{id}/{id_prj}',[
            'uses' => 'ProjectBonusController@index',
            'as' => 'project_bonus_index']);
        Route::get('project_bonus_create/{id}', [
            'uses' => 'ProjectBonusController@create',
            'as' => 'project_bonus_create']);

        Route::resource('ps_transaction', 'PSTransactionController');
        Route::get('ps_transaction_index/{id}/{id_prj}',[
            'uses' => 'PSTransactionController@index',
            'as' => 'ps_transaction_index']);
        Route::get('ps_transaction_create/{id}', [
            'uses' => 'PSTransactionController@create',
            'as' => 'ps_transaction_create']);

        Route::resource('worker_contract', 'WorkerContractController');
        Route::get('worker_contract_index/{id}',[
            'uses' => 'WorkerContractController@index',
            'as' => 'worker_contract_index']);
        Route::get('worker_contract_create/{id}', [
            'uses' => 'WorkerContractController@create',
            'as' => 'worker_contract_create']);

        Route::resource('pct', 'PCTController');
        Route::get('pct_index/{id}/{id_prj}',[
            'uses' => 'PCTController@index',
            'as' => 'pct_index']);
        Route::get('pct_create/{id}', [
            'uses' => 'PCTController@create',
            'as' => 'pct_create']);

        Route::resource('warehouse', 'WarehouseController');

        Route::resource('employee', 'EmployeeController');
        Route::resource('employee_salary', 'EmployeeSalaryController');

        Route::resource('employee_transaction', 'EmployeeTransactionController');
        Route::get('employee_transaction_index/{id}',[
            'uses' => 'EmployeeTransactionController@index',
            'as' => 'employee_transaction_index']);
        Route::get('employee_transaction_create/{id}', [
            'uses' => 'EmployeeTransactionController@create',
            'as' => 'employee_transaction_create']);

        Route::resource('employee_bonus', 'EmployeeBonusController');
        Route::get('employee_bonus_index/{id}',[
            'uses' => 'EmployeeBonusController@index',
            'as' => 'employee_bonus_index']);
        Route::get('employee_bonus_create/{id}', [
            'uses' => 'EmployeeBonusController@create',
            'as' => 'employee_bonus_create']);

        Route::resource('mutation', 'MutationController');

        Route::resource('warehouse_rent', 'WarehouseRentController');

        Route::resource('rent_payment', 'RentPaymentController');
        Route::get('rent_payment_create/{id}', [
            'uses' => 'RentPaymentController@create',
            'as' => 'rent_payment_create']);

        Route::resource('warehouse_sell', 'WarehouseSellController');

        Route::resource('transportation', 'TransportationController');
        Route::get('transportation_update_status/{status}/{id}', [
            'uses' => 'TransportationController@updateStatus',
            'as' => 'transportation_update_status']);

        Route::resource('transaction_transportation', 'TransactionTransportationController');
        Route::get('transaction_transportation_index/{id}',[
            'uses' => 'TransactionTransportationController@index',
            'as' => 'transaction_transportation_index']);
        Route::get('transaction_transportation_create/{id}', [
            'uses' => 'TransactionTransportationController@create',
            'as' => 'transaction_transportation_create']);

        Route::resource('fuel', 'FuelController');

        Route::resource('repair_and_used', 'RepairAndUsedController');

        Route::resource('salary_month', 'SalaryMonthController');

        Route::resource('salary_month_detail', 'SMDetailController');
        Route::get('salary_month_detail_create/{id}', [
            'uses' => 'SMDetailController@create',
            'as' => 'smd_create']);

        Route::resource('company_cash', 'CompanyCashController');

        Route::resource('private_money', 'PrivateMoneyController');

        Route::get('/home', 'DashboardController@index')->name('home');

    });

    Route::group(['middleware' => [
        'role:SUPER_ADMIN'
        ]], function(){
        
        Route::resource('user', 'UserController');
    });

    Auth::routes();

