<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Sales Tax / API
Route::get('/dataTaxes', 'TaxesController@dataTaxes');
Route::post('/insertTaxes', 'TaxesController@insertTaxes');
Route::get('/editTaxes/{id}', 'TaxesController@editTaxes');
Route::post('/updateTaxes/{id}', 'TaxesController@updateTaxes');
Route::get('/deleteTaxes/{id}', 'TaxesController@deleteTaxes');
// Route::get('/changeStatus/{id}', 'UserController@changeStatus');

// CLients
Route::get('/dataClients', 'ClientsController@dataClients');
Route::post('/insertClients', 'ClientsController@insertClients');
Route::get('/editClients/{id}', 'ClientsController@editClients');
Route::post('/updateClients/{id}', 'ClientsController@updateClients');
Route::get('/deleteClients/{id}', 'ClientsController@deleteClients');
// Route::get('/detailClients/{id}', 'ClientsController@editClients');

// Categories / API
Route::get('/dataCategories', 'CategoriesController@dataCategories');
Route::post('/insertCategories', 'CategoriesController@insertCategories');
Route::get('/editCategories/{id}', 'CategoriesController@editCategories');
Route::post('/updateCategories/{id}', 'CategoriesController@updateCategories');
Route::get('/deleteCategories/{id}', 'CategoriesController@deleteCategories');

// Budgets / API
Route::get('/dataBudgets', 'BudgetsController@dataBudgets');
Route::post('/insertBudgets', 'BudgetsController@insertBudgets');
Route::get('/editBudgets/{id}', 'BudgetsController@editBudgets');
Route::post('/updateBudgets/{id}', 'BudgetsController@updateBudgets');
Route::get('/deleteBudgets/{id}', 'BudgetsController@deleteBudgets');

// Revenues / API
Route::get('/dataRevenues', 'RevenuesController@dataRevenues');
Route::post('/insertRevenues', 'RevenuesController@insertRevenues');
Route::get('/editRevenues/{id}', 'RevenuesController@editRevenues');
Route::post('/updateRevenues/{id}', 'RevenuesController@updateRevenues');
Route::get('/deleteRevenues/{id}', 'RevenuesController@deleteRevenues');

// Expenses
Route::get('/dataExpenses', 'ExpensesController@dataExpenses');
Route::post('/insertExpenses', 'ExpensesController@insertExpenses');
Route::get('/editExpenses/{id}', 'ExpensesController@editExpenses');
Route::post('/updateExpenses/{id}', 'ExpensesController@updateExpenses');
Route::get('/deleteExpenses/{id}', 'ExpensesController@deleteExpenses');

// Departements
Route::get('/dataDepartement', 'DepartmentController@dataDepartement');
Route::post('/insertDepartement', 'DepartmentController@store');
Route::get('/editDepartment/{id}', 'DepartmentController@edit');
Route::post('/updateDepartment/{id}', 'DepartmentController@update');
Route::get('/deleteDepartment/{id}', 'DepartmentController@destroy');

// Projects
Route::get('/dataProjects', 'ProjectsController@dataProjects');
Route::post('/insertProjects', 'ProjectsController@insertProjects');
Route::get('/editProjects/{id}', 'ProjectsController@editProjects');
Route::post('/updateProjects/{id}', 'ProjectsController@updateProjects');
Route::get('/deleteProjects/{id}', 'ProjectsController@deleteProjects');
// Route::get('/detailProjects/{id}', 'ProjectsController@detailProjects');

// Holidays
Route::get('/dataHolidays', 'HolidaysController@dataHolidays');
Route::post('/insertHolidays', 'HolidaysController@insertHolidays');
Route::get('/editHolidays/{id}', 'HolidaysController@editHolidays');
Route::post('/updateHolidays/{id}', 'HolidaysController@updateHolidays');
Route::get('/deleteHolidays/{id}', 'HolidaysController@deleteHolidays');

// Designations
Route::get('/Designation', 'RoleController@data');
Route::get('/Designationcreate', 'DesignationController@create');
Route::post('/Designation', 'RoleController@store');
Route::get('/editDesignation/{id}', 'RoleController@edit');
Route::put('/Designation/{id}', 'RoleController@update');
