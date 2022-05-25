<?php

use App\Http\Controllers\Admin\CouresRegController;
use App\Http\Controllers\Admin\CouresRegFormController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseListContoller;
use App\Http\Controllers\Admin\CourseOfferContoller;
use App\Http\Controllers\Admin\CourseOfferController;
use App\Http\Controllers\Admin\CoursListController;
use App\Http\Controllers\Admin\CoursRegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\FacilityContoller;
use App\Http\Controllers\Admin\GradpointController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\ResultInfocontroller;
use App\Http\Controllers\Admin\ResultListcontroller;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SubjectCodeController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectCreditController;
use App\Http\Controllers\Admin\TeacherContoller;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Site\CouresRegController as SiteCouresRegController;
use App\Http\Controllers\Site\CourseRegistrionController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Middleware\OnlyAdmin;
use App\Models\CourseRegistration;
use Illuminate\Routing\RouteRegistrar;
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

Route::get("/");

Route::prefix('/admin')->middleware(['auth', OnlyAdmin::class])->group(function () {
  Route::get("/dashboard", [DashboardController::class, 'index']);
  Route::resource("/groups", GroupController::class);
  Route::resource("/semesters", SemesterController::class);
  Route::resource("/facilitis", FacilityContoller::class);
  Route::resource("/courselists", CourseListContoller::class);
  Route::resource("/coursoffers", CourseOfferContoller::class);
  Route::resource("/exams",ExamController::class);
  Route::resource("/resultinfos",ResultInfocontroller::class);
  Route::resource("/gradpoints", GradpointController::class);
  Route::resource("/teachers", TeacherController::class);
});

require __DIR__ . '/auth.php';
