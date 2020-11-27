<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'contact_form']);
Route::get('/courses', [App\Http\Controllers\HomeController::class, 'courses']);
Route::get('/jobs', [App\Http\Controllers\HomeController::class, 'jobs']);
Route::get('/job-details/{id}', [App\Http\Controllers\HomeController::class, 'job_details']);
Route::match(['get', 'post'], '/search-job', [App\Http\Controllers\HomeController::class, 'search_job']);

//employers
Route::group(['prefix' => 'employer', 'middleware' => ['auth', 'employer']], function () {
  Route::get('/', [App\Http\Controllers\employer\DashboardController::class, 'index'])->name('employer');
  Route::get('/manage-jobs', [App\Http\Controllers\employer\JobsController::class, 'manage_jobs']);
  Route::get('/manage-care-givers', [App\Http\Controllers\employer\JobsController::class, 'manage_care_giver']);
  Route::get('/post-new-job', [App\Http\Controllers\employer\JobsController::class, 'post_job']);
  Route::get('/get-sub-cat/{id}', [App\Http\Controllers\employer\JobsController::class, 'get_sub_cat']);
  Route::post('/post-new-job', [App\Http\Controllers\employer\JobsController::class, 'new_job']);
  Route::post('/delete-job', [App\Http\Controllers\employer\JobsController::class, 'delete_job']);
  Route::get('/view-job/{id}', [App\Http\Controllers\employer\JobsController::class, 'view_job']);
  Route::get('/edit-job/{id}', [App\Http\Controllers\employer\JobsController::class, 'edit_job']);
  Route::get('/applied-jobs', [App\Http\Controllers\employer\JobsController::class, 'applied_jobs']);
  Route::get('/approve-job/{id}', [App\Http\Controllers\employer\JobsController::class, 'approve_job']);
  Route::get('/deny-job/{id}', [App\Http\Controllers\employer\JobsController::class, 'deny_job']);
  Route::get('/profile', [App\Http\Controllers\employer\SettingsController::class, 'profile']);
  Route::post('/profile', [App\Http\Controllers\employer\SettingsController::class, 'update_profile']);
  Route::get('/change-password', [App\Http\Controllers\employer\SettingsController::class, 'change_password']);
  Route::post('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'change']);
  Route::get('/transactions', [App\Http\Controllers\employer\TransactionController::class, 'index']);
  Route::get('/messages', [App\Http\Controllers\employer\MessageController::class, 'index']);
  Route::get('/message/{id}', [App\Http\Controllers\employer\MessageController::class, 'message']);
  Route::post('/message', [App\Http\Controllers\employer\MessageController::class, 'sendMessage']);
});

//Care Giver
Route::group(['prefix' => 'care-giver', 'middleware' => ['auth', 'care-giver']], function () {
  Route::get('/', [App\Http\Controllers\CareGiver\DashboardController::class, 'index'])->name('care-giver');
  Route::get('/transactions', [App\Http\Controllers\CareGiver\TransactionController::class, 'index']);
  Route::get('/new-jobs', [App\Http\Controllers\CareGiver\JobsController::class, 'new_job']);
  Route::get('/plans', [App\Http\Controllers\CareGiver\PlanController::class, 'index']);
  Route::get('/applied-jobs', [App\Http\Controllers\CareGiver\JobsController::class, 'applied_job']);
  Route::get('/profile', [App\Http\Controllers\CareGiver\SettingsController::class, 'profile']);
  Route::post('/profile', [App\Http\Controllers\CareGiver\SettingsController::class, 'update_profile']);
  Route::get('/change-password', [App\Http\Controllers\CareGiver\SettingsController::class, 'change_password']);
  Route::post('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'change']);
  Route::match(['get', 'post'], '/search-job', [App\Http\Controllers\CareGiver\JobsController::class, 'search_job']);
  Route::get('/view-job/{id}', [App\Http\Controllers\CareGiver\JobsController::class, 'view_job']);
  Route::post('/apply-job', [App\Http\Controllers\CareGiver\JobsController::class, 'apply_job']);
  Route::post('/delete-job', [App\Http\Controllers\CareGiver\JobsController::class, 'delete_job']);
  Route::post('/make-payment', [App\Http\Controllers\CareGiver\PlanController::class, 'payment']);
  Route::get('/messages', [App\Http\Controllers\CareGiver\MessageController::class, 'index']);
  Route::get('/message/{id}', [App\Http\Controllers\CareGiver\MessageController::class, 'message']);
  Route::post('/message', [App\Http\Controllers\CareGiver\MessageController::class, 'sendMessage']);
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
  Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
  Route::get('/new-plan', [App\Http\Controllers\Admin\PlanController::class, 'new_plan']);
  Route::get('/edit-plan/{id}', [App\Http\Controllers\Admin\PlanController::class, 'edit_plan_now']);
  Route::post('/edit-plan', [App\Http\Controllers\Admin\PlanController::class, 'edit_plan']);
  Route::post('/new-plan', [App\Http\Controllers\Admin\PlanController::class, 'create_new_plan']);
  Route::get('/plans', [App\Http\Controllers\Admin\PlanController::class, 'index']);
  Route::get('/transactions', [App\Http\Controllers\Admin\TransactionController::class, 'index']);
  Route::get('/job-alert', [App\Http\Controllers\Admin\JobController::class, 'job_alert']);
  Route::get('/all-job', [App\Http\Controllers\Admin\JobController::class, 'all_job']);
  Route::post('/job-status-update', [App\Http\Controllers\Admin\JobController::class, 'update_job_status']);
  Route::post('/delete-job-sub', [App\Http\Controllers\Admin\JobController::class, 'delete_sub']);
  Route::post('/delete-job-cat', [App\Http\Controllers\Admin\JobController::class, 'delete_cat']);
  Route::match(['get', 'post'], '/job-categories', [App\Http\Controllers\Admin\JobController::class, 'category']);
  Route::match(['get', 'post'], '/add-job-category', [App\Http\Controllers\Admin\JobController::class, 'add_category']);
  Route::match(['get', 'post'], '/job-sub-categories', [App\Http\Controllers\Admin\JobController::class, 'sub_category']);
  Route::match(['get', 'post'], '/add-job-sub-category', [App\Http\Controllers\Admin\JobController::class, 'add_sub_category']);
  Route::get('/manage-jobs', [App\Http\Controllers\Admin\JobController::class, 'manage_job']);
  Route::get('/view-job/{id}', [App\Http\Controllers\Admin\JobController::class, 'view_job']);
  Route::get('/profile', [App\Http\Controllers\Admin\SettingsController::class, 'profile']);
  Route::post('/profile', [App\Http\Controllers\Admin\SettingsController::class, 'update_profile']);
  Route::get('/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'change_password']);
  Route::post('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'change']);
});
