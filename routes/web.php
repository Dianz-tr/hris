<?php

use App\Taskboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

// profile
Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile-upload', 'ProfileController@uploadProfileImage');
// Route::post('Profile/store', 'ProfileController@store')->name('profile/store');
// Route::get('/profile/{id}/edit', 'ProfileController@editProfile')->name('profile.edit');
Route::patch('profile/{id}/update', 'ProfileController@updateProfile')->name('profile.update');
// Route::patch('/profile/upload', 'ProfileController@uploadPhoto')->name('profile.upload');

Route::middleware(['auth', 'role:Admin'])->group(function () {

    // Projects / API
    Route::get('/projects', 'ProjectsController@index')->name('dtProjects');
    Route::get('/detailProjects/{id}', 'ProjectsController@detailProjects')->name('detailProjects');

    // Leads / Projects
    Route::get('/leads', 'ProjectsController@leads')->name('dtLeads');
    Route::get('/leads/{id}/delete', 'ProjectsController@deleteLeads')->name('deleteLeads');

    // Sales Taxes / API
    Route::get('/taxes', 'TaxesController@index')->name('dtTaxes');

    // Category / API
    Route::get('/categories', 'CategoriesController@index')->name('dtCategories');

    // Budgets / API
    Route::get('/budgets', 'BudgetsController@index')->name('dtBudgets');

    // Revenues / API
    Route::get('/revenues', 'RevenuesController@index')->name('dtrevenues');

    // Expenses / API
    Route::get('/budget-expenses', 'ExpensesController@index')->name('dtexpenses');

    // Clients / API
    Route::get('/clients', 'ClientsController@index')->name('dtclients');
    Route::get('/showClients/{id}', 'ClientsController@detailClients')->name('showClients');
    // Route::get('/clients{id}/detail', 'ClientsController@detailClients')->name('detailClient');

    // Sales / Estimates
    Route::get('/estimates', 'EstimateController@index')->name('dtEstimate');
    Route::get('/estimates/create', 'EstimateController@create')->name('createEstimate');
    Route::get('show/tax/estimates', 'EstimateController@showdatatax');
    Route::get('show/clients/estimates', 'EstimateController@showdataclients');
    Route::post('/estimates/store', 'EstimateController@store')->name('storeEstimate');
    Route::get('/estimates/{id}/edit', 'EstimateController@edit')->name('editEstimate');
    Route::post('/estimates/{id}/update', 'EstimateController@update')->name('updateEstimate');
    Route::get('/estimates/{id}/delete', 'EstimateController@destroy')->name('deleteEstimate');


    // Sales / Invoices
    Route::get('/invoices', 'InvoicesController@index')->name('dtInvoices');
    Route::get('/invoices/create', 'InvoicesController@create')->name('createInvoices');
    Route::get('show/tax/invoices', 'InvoicesController@showdatatax');
    Route::get('show/clients/invoices', 'InvoicesController@showdataclients');
    Route::post('/invoices/store', 'InvoicesController@store')->name('storeInvoices');
    Route::get('/invoices/{id}/edit', 'InvoicesController@edit')->name('editInvoices');
    Route::post('/invoices/{id}/update', 'InvoicesController@update')->name('updateInvoices');
    Route::get('/invoices/{id}/delete', 'InvoicesController@destroy')->name('deleteInvoices');
    Route::get('/invoice-view/{id}/show', 'InvoicesController@view')->name('viewInvoice');

    // Sales / Expenses
    Route::get('/expenses', 'SalesExpenseController@index')->name('dtExpense');
    Route::get('/expenses/create', 'SalesExpenseController@create')->name('createExpense');
    Route::post('/expenses/store', 'SalesExpenseController@store')->name('storeExpense');
    Route::get('/expenses/{id}/edit', 'SalesExpenseController@edit')->name('editExpense');
    Route::post('/expenses/{id}/update', 'SalesExpenseController@update')->name('updateExpense');
    Route::get('/expenses/{id   }/delete', 'SalesExpenseController@destroy')->name('deleteExpense');
    // Route::get('/expenses-reports', 'SalesExpenseController@destroy')->name('deleteExpense');

    // Sales / Provident_fund
    Route::get('/providentFund', 'ProvidentFundController@index')->name('dtProvident');
    Route::get('/providentFund/create', 'ProvidentFundController@create')->name('createProvidentFund');
    Route::post('/providentFund/store', 'ProvidentFundController@store')->name('storeProvidentFund');
    Route::get('/providentFund/{id}/edit', 'ProvidentFundController@edit')->name('editProvidentFund');
    Route::post('/providentFund/{id}/update', 'ProvidentFundController@update')->name('updateProvidentFund');
    Route::get('/providentFund/{id}/delete', 'ProvidentFundController@destroy')->name('deleteProvidentFund');

    // Assets
    Route::get('/dataAssets', 'AssetsController@index')->name('dataAssets');
    Route::get('/assets/create', 'AssetsController@create')->name('createAssets');
    Route::post('/assets/store', 'AssetsController@store')->name('storeAssets');
    Route::get('/assets/{id}/edit', 'AssetsController@edit')->name('editAssets');
    Route::post('/assets/{id}/update', 'AssetsController@update')->name('updateAssets');
    Route::get('/assets/{id}/delete', 'AssetsController@destroy')->name('deleteAssets');

    // Route::get('/izins', 'IzinsController@index')->name('izins');
});

Route::middleware(['auth', 'role:Karyawan'])->group(function () {
});

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::prefix('admin')->group(function () {
});

// event calendar
Route::get('event/add', 'EventController@create');
Route::post('event/add', 'EventController@store');
Route::get('event', 'EventController@calender')->name('event');

Auth::routes(['register' => false]);
Route::get('home', 'HomeController@index')->name('home');
Route::get('employee-dashboard', 'HomeController@indexemploy')->name('dashboard_employ');


// Route::get('dtprojects', 'ProjectsController@dtProjects')->name('dtprojects');

/* =============================Employees========================== */
// employees
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::post('/employee-store', 'EmployeeController@store')->name('employee.store');
Route::put('/employee/{id}', 'EmployeeController@update')->name('employee.update');
Route::get('/employee/{id}/delete', 'EmployeeController@destroy')->name('employee.delete');

// holidays
Route::get('/holidays', 'HolidaysController@index')->name('dtholidays');

// Leaves
Route::get('/leaves', 'LeavesController@index')->name('leaves');
Route::post('/leaves/store', 'LeavesController@store')->name('storeLeaves');
Route::put('/leaves/{id}/update', 'LeavesController@update')->name('updateLeaves');
Route::get('leaves/{id}/delete', 'LeavesController@destroy')->name('deleteLeaves');
// Leaves Admin
Route::get('/leaves-admin', 'LeavesController@index_admin')->name('leaves.admin');
Route::get('/leaves-approve/{id}/pending', 'LeavesController@approve_Pending')->name('approve.pending');
Route::get('/leaves-approve/{id}/approved', 'LeavesController@approve_approved')->name('approve.approved');
Route::get('/leaves-approve/{id}/declined', 'LeavesController@approve_declined')->name('approve.declined');

Route::get('leave-settings', 'LeavesettingController@index')->name('l.setting');
Route::get('leave-settings/changeStatus', 'LeavesettingController@changeStatus')->name('l.change');

// attendance Admin
Route::get('/dtabsen', 'AttendanceController@dataAbsen')->name('dtabsen');

// attendance employee
Route::get('/attendance', 'AttendanceController@index')->name('attendance');
Route::post('/absen', 'AttendanceController@attendance')->name('absen');

// department
Route::get('/departments', 'DepartmentController@index')->name('dtDepartment');

// designations
Route::get('/designations', 'DesignationController@index')->name('dtdesignation');
Route::post('/designations/store', 'DesignationController@store')->name('designation.store');
Route::get('/designations/{id}/edit', 'DesignationController@edit')->name('designation.edit');
Route::put('/designations/{id}', 'DesignationController@update')->name('designation.update');
Route::get('/designations/{id}/delete', 'DesignationController@destroy')->name('designation.delete');

// timesheet
Route::get('/timesheet', 'TimesheetController@index')->name('timesheet');
Route::post('/timesheet-save', 'TimesheetController@store')->name('timesheet.store');
Route::patch('timesheet/{id}', 'TimesheetController@update')->name('timesheet.update');
Route::get('timesheet/{id}', 'TimesheetController@destroy')->name('timesheet.delete');

// shift-  scheduling
Route::get('/shift-scheduling', 'ShiftSchedulController@index')->name('schedule');
Route::post('/shift-scheduling', 'ShiftSchedulController@store')->name('schedule.store');
Route::put('/shift-scheduling/{id}/update', 'ShiftSchedulController@update')->name('schedule.update');
Route::get('/shift-scheduling/{id}/delete', 'ShiftSchedulController@destroy')->name('schedule.delete');
Route::get('/show/data/shift', 'ShiftSchedulController@shodata')->name('schedule.show');


// shift scheduling list
Route::get('/shift-list', 'ShiftSchedulController@shifts')->name('shifts');
Route::post('/shift-list', 'ShiftSchedulController@shift_store')->name('shift.store');
Route::put('/shift-list/{id}/update', 'ShiftSchedulController@shift_update')->name('shift.update');
Route::get('/shift-list/{id}/delete', 'ShiftSchedulController@shift_destroy')->name('shift.delete');

// overtime
Route::get('overtime', 'OvertimeController@index')->name('overtime');
Route::post('overtime-store', 'OvertimeController@store')->name('overtime.store');
Route::patch('overtime/{id}', 'OvertimeController@update')->name('overtime.update');
Route::get('overtime/{id}', 'OvertimeController@destroy')->name('overtime.destroy');
/* ===============================End Employees============================== */

/* ====================================Payroll=================================*/
// Employee Salary
Route::get('salary', 'SalaryController@index')->name('employee.salary');
Route::post('salary', 'SalaryController@store')->name('salary.store');
Route::patch('salary/{id}', 'SalaryController@update')->name('salary.update');
Route::get('salary/{id}/delete', 'SalaryController@destroy')->name('salary.destroy');

// salary view
Route::get('salary-view/{id}', 'SalaryController@generate')->name('salary.generate');

// Payroll Type
Route::get('payroll-items', 'PayrolltypeController@index')->name('p_type');
Route::post('payroll-items/store', 'PayrolltypeController@store')->name('payrolltype/store');
Route::patch('payroll-items/{id}/edit', 'PayrolltypeController@update')->name('payrolltype/update');
Route::get('payroll-items/{id}/{type}', 'PayrolltypeController@destroy')->name('payrolltype/delete');

/* ===============================End Payroll============================== */

Route::get('/task', 'TaskController@index')->name('task');
Route::post('/task', 'TaskController@create')->name('createTask');
Route::post('/task', 'TaskController@store')->name('storeTask');
Route::get('/task/{id}/edit', 'TaskController@edit')->name('editTask');
Route::put('/task/{id}', 'TaskController@update')->name('updateTask');
Route::get('task/{id}', 'TaskController@destroy')->name('deleteTask');

// Taskboard
Route::get('/taskboard', 'TaskboardController@index')->name('taskboard');
Route::post('/taskboard', 'TaskboardController@create')->name('createTaskboard');
Route::post('/taskboard', 'TaskboardController@store')->name('storeTaskboard');
Route::get('/taskboard/{id}/edit', 'TaskboardController@edit')->name('editTaskboard');
Route::put('/taskboard/{id}', 'TaskboardController@update')->name('updateTaskboard');
Route::get('taskboard/{id}', 'TaskboardController@destroy')->name('deleteTaskboard');

// goal
Route::get('/goal', 'GoalController@index')->name('goal');
Route::post('/goal', 'GoalController@create')->name('createGoal');
Route::post('/goal', 'GoalController@store')->name('storeGoal');
Route::get('goal/{id}/edit', 'GoalController@edit')->name('editGoal');
Route::put('/goal/{id}', 'GoalController@update')->name('updateGoal');
Route::get('goal/{id}', 'GoalController@destroy')->name('deleteGoal');

// goal type
Route::get('/goaltype', 'GoaltypeController@index')->name('goaltype');
Route::post('/goaltype', 'GoaltypeController@create')->name('createGoaltype');
Route::post('/goaltype', 'GoaltypeController@store')->name('storeGoaltype');
Route::get('goaltype/{id}/edit', 'GoaltypelController@edit')->name('editGoaltype');
Route::put('/goaltype/{id}', 'GoaltypeController@update')->name('updateGoaltype');
Route::get('goaltype/{id}', 'GoaltypeController@destroy')->name('deleteGoaltype');

// terminations
Route::get('/terminations', 'TerminationsController@index')->name('termination');
Route::post('/terminations/store', 'TerminationsController@store')->name('storeTermination');
Route::put('/terminations/update/{id}', 'TerminationsController@update')->name('updateTermination');
Route::get('terminations/{id}', 'TerminationsController@destroy')->name('deleteTermination');

// Promotions
Route::get('/promotions', 'PromotionsController@index')->name('promotions');
Route::post('/promotions/crreate', 'PromotionsController@create')->name('createPromotions');
Route::post('/promotions/store', 'PromotionsController@store')->name('storePromotions');
Route::get('/show/promotions/employee', 'PromotionsController@showData')->name('showData');
Route::get('promotions/{id}/edit', 'PromotionsController@edit')->name('editPromotions');
Route::put('/promotions/update/{id}', 'PromotionsController@update')->name('updatePromotions');
Route::get('promotions/{id}', 'PromotionsController@destroy')->name('deletePromotions');

// Resignation
Route::get('/resignation', 'ResignationController@index')->name('resignation');
Route::post('/resignation/store', 'ResignationController@store')->name('storeResignation');
Route::put('/resignation/update/{id}', 'ResignationController@update')->name('updateResignation');
Route::get('resignation/{id}/delete', 'ResignationController@destroy')->name('deleteResignation');



// Ticket
Route::get('/ticket', 'TicketController@index')->name('ticket');
Route::get('/ticket/create', 'TicketController@create')->name('createTicket');
Route::post('/ticket/store', 'TicketController@store')->name('storeTicket');
Route::get('ticket/{id}/edit', 'TicketController@edit')->name('editTicket');
Route::put('/ticket/{id}/update', 'TicketController@update')->name('updateTicket');
Route::get('ticket/{id}/destroy', 'TicketController@destroy')->name('deleteTicket');
Route::get('/ticket/search', 'TicketController@search')->name('searchTicket');
// Route::get('/ticket/search','TicketController@reportsindex')->name('searchTicket');

// Performa apparsial
Route::get('/performance-appraisal', 'PerformappController@index')->name('performapp');
Route::post('/performance-appraisal/store', 'PerformappController@store')->name('storePerformapp');
Route::put('/performance-appraisal/update/{id}', 'PerformappController@update')->name('updatePerformapp');
Route::get('performance-appraisal/{id}/destroy', 'PerformappController@destroy')->name('deletePerformapp');

// Performance Indicator
Route::get('/performance-indicator', 'PerformindiController@index')->name('performindi');
Route::post('/performance-indicator/store', 'PerformindiController@store')->name('storePerformindi');
Route::put('/performance-indicator/update/{id}', 'PerformindiController@update')->name('updatePerformindi');
Route::get('performance-indicator/{id}/destroy', 'PerformindiController@destroy')->name('deletePerformindi');

/* =============================== Jobs ============================== */

// Candidate
Route::get('/candidate', 'CandidateController@index')->name('candidate');
Route::get('/candidate/create', 'CandidateController@create')->name('createCandidate');
Route::post('/candidate/store', 'CandidateController@store')->name('storeCandidate');
Route::get('candidate/{id}/', 'CandidateController@edit')->name('editCandidate');
Route::put('candidate/{id}', 'CandidateController@update')->name('updateCandidate');
Route::get('/candidate/{id}', 'CandidateController@destroy')->name('deleteCandidate');

//Interview Questions
Route::get('/interview-questions', 'InterquestController@index')->name('interquest');
Route::post('/interview-questions/store', 'InterquestController@store')->name('storeInterquest');
Route::get('interview-questions/{id}/edit', 'InterquestController@edit')->name('editInterquest');
Route::put('/interview-questions/update/{id}', 'InterquestController@update')->name('updateInterquest');
Route::get('interview-questions/{id}', 'InterquestController@destroy')->name('deleteInterquest');

// Experience level
Route::get('/experience', 'ExperienceController@index')->name('experience');
Route::post('/experience', 'ExperienceController@create')->name('createExperience');
Route::post('/experience', 'ExperienceController@store')->name('storeExperience');
Route::get('experience/{id}/edit', 'ExperienceController@edit')->name('editExperience');
Route::put('/experience/{id}', 'ExperienceController@update')->name('updateExperience');
Route::get('experience/{id}', 'ExperienceController@destroy')->name('deleteExperience');


// Manage Jobs
Route::get('/manage-jobs', 'ManagejobsController@index')->name('manage_jobs');
Route::get('/manage-jobs/create', 'ManagejobsController@create')->name('createManagejobs');
Route::post('/manage-jobs/store', 'ManagejobsController@store')->name('storeManagejobs');
Route::get('manage-jobs/{id}/', 'ManagejobsController@edit')->name('editManagejobs');
Route::put('manage-jobs/{id}', 'ManagejobsController@update')->name('updateManagejobs');
Route::get('/manage-jobs/{id}', 'ManagejobsController@destroy')->name('deleteManagejobs');

//Manage Resume
Route::get('/manage-resume', 'ManagejobsController@manageresume')->name('manage-resume');
// Shortlist Candidates
Route::get('/shortlist-candidate', 'ManagejobsController@shortlistcanidate')->name('shortlist-candidate');

//Offer Approvals
Route::get('/offer-approval', 'ManagejobsController@offerapproval')->name('offer-approval');


/* =============================== End Jobs ============================== */

/* =============================== Reports ============================== */

// User Reports
Route::get('/user-reports', 'UserscreateController@reportsindex')->name('user-reports');

// Route::get('/search-users', 'UsersController@search')->name('search.users');
Route::get('/users/search', 'UserscreateController@reportsindex')->name('searchUsers');

Route::get('/users/search', 'UserscreateController@reportsindex')->name('searchUsers');


// Employee Reports
Route::get('/employee-reports', 'EmployeeController@reportsindex')->name('employee-reports');

// Route::get('/expenses-reports', 'ExpensesController@reportsindex')->name('expenses-reports');
// Route::get('employee', ['as' => 'employees', 'employee' => 'EmployeeController@indexpdf']);
Route::get('view-pdf/', ['as' => 'view-pdf', 'employee' => 'EmployeeController@viewPDF']);
Route::get('download-pdf/', ['as' => 'download-pdf', 'employee' => 'EmployeeController@downloadPDF']);

Route::get('view-pdf/', ['as' => 'view-pdf', 'employee' => 'EmployeeController@viewPDF']);
Route::get('download-pdf/', ['as' => 'download-pdf', 'employee' => 'EmployeeController@downloadPDF']);
// Route::get('/expenses-reports', 'ExpensesController@reportsindex')->name('expenses-reports');
// Route::get('employee', ['as' => 'employees', 'employee' => 'EmployeeController@indexpdf']);

// Invoices Reports
Route::get('/invoices-reports', 'InvoicesController@reportsindex')->name('Invoices-reports');

//Payslip Reports
Route::get('/payslip-reports', 'SalaryController@reportsindex')->name('payslip-reports');

//Expenses Reports
Route::get('/expenses-reports', 'SalesExpenseController@reportsindex')->name('expenses-reports');
Route::get('/search-expenses-reports', 'SalesExpenseController@reportsindex')->name('searchSalesExpense');
// Route::get('/expenses/search','SalesExpensesController@reportsindex')->name('searchExpenses');
// Route::get('/expenses/search','SalesExpenseController@searchindex')->name('searchExpense');

//Attendance Reports
Route::get('/attendance-reports', 'AttendanceController@reportsindex')->name('attendance-reports');

Route::get('/leave-reports', 'LeavesController@reportsindex')->name('leave-reports');

/* ===============================End Reports============================== */

//User Dashboard Jobs
Route::get('/user-dashboard-jobs', 'ManagejobsController@userdashboardjobs')->name('user-dashboard-jobs');

//User Dashboard
Route::get('/user-dashboard', 'ManagejobsController@userdashboard')->name('user-dashboard');

// Policies
Route::get('/policies', 'PoliciesController@index')->name('policies');
Route::post('/policies/store', 'PoliciesController@store')->name('storePolicies');
Route::get('policies/{id}/edit', 'PoliciesController@edit')->name('editPolicies');
Route::put('/policies/{id}/update', 'PoliciesController@update')->name('updatePolicies');
Route::get('policies/{id}', 'PoliciesController@destroy')->name('deletePolicies');
// Route::get('policies/download', 'PoliciesController@getDownload')->name('downloadPolicies');
// Route::post('policies/uploadfile','PoliciesController@uploadFile');

// trainers
Route::get('/trainer', 'TrainersController@index')->name('trainer');
Route::post('/trainer', 'TrainersController@create')->name('createTrainer');
Route::post('/trainer', 'TrainersController@store')->name('storeTrainer');
Route::put('/trainer/{id}', 'TrainersController@update')->name('updateTrainer');
Route::get('trainer/{id}', 'TrainersController@destroy')->name('deleteTrainer');

// training
Route::get('/training', 'TrainingController@index')->name('training');
Route::post('/training/create', 'TrainingController@create')->name('createTraining');
Route::post('/training/store', 'TrainingController@store')->name('storeTraining');
Route::get('training/{id}/edit', 'TrainingController@edit')->name('editTraining');
Route::put('/training/{id}/update', 'TrainingController@update')->name('updateTraining');
Route::get('training/{id}', 'TrainingController@destroy')->name('deleteTraining');

// training type
Route::get('/trainingtype', 'TrainingtypeController@index')->name('trainingtype');
Route::post('/trainingtype', 'TrainingtypeController@create')->name('createTrainingtype');
Route::post('/trainingtype', 'TrainingtypeController@store')->name('storeTrainingtype');
Route::get('trainingtype/{id}/edit', 'TrainingtypelController@edit')->name('editTrainingtype');
Route::put('/trainingtype/{id}', 'TrainingtypeController@update')->name('updateTrainingtype');
Route::get('trainingtype/{id}', 'TrainingtypeController@destroy')->name('deleteTrainingtype');

// experience level
Route::get('/experience', 'ExperienceController@index')->name('experience');
Route::post('/experience', 'ExperienceController@create')->name('createExperience');
Route::post('/experience', 'ExperienceController@store')->name('storeExperience');
Route::get('experience/{id}/edit', 'ExperienceController@edit')->name('editExperience');
Route::put('/experience/{id}', 'ExperienceController@update')->name('updateExperience');
Route::get('experience/{id}', 'ExperienceController@destroy')->name('deleteExperience');

Route::get('users/', 'UserscreateController@index')->name('users');
Route::get('show/data/employ', 'UserscreateController@showdata');
Route::post('users/create', 'UserscreateController@store')->name('users.create');
Route::put('users/{id}/update', 'UserscreateController@update')->name('users.update');
Route::get('users/{id}/delete', 'UserscreateController@destroy')->name('users.delete');

// Route::get('detailProjects/{id}', function ($id) {
//     $users = DB::table('tbl_project_users')
//         ->select('tbl_project_users.*', 'tbl_projects.project_name as project_name', 'users.name as user_name')
//         ->join('users', 'tbl_project_users.id_user', '=', 'users.id')
//         ->join('tbl_projects', 'tbl_project_users.id_project', '=', 'tbl_projects.id')
//         ->where('tbl_project_users.id_project', $id)
//         ->get();
//     return $users;
// });
