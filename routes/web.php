<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\InstructorCourseController;
use App\Http\Controllers\InstructorResourceController;

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

// For Testing Only
Route::get('/test',[UserController::class,'test']);


// Global Site Section
Route::get('/',[UserController::class,'index']);
Route::get('view/{id}',[UserController::class,'view']);
Route::get('search/courses',[UserController::class,'search']);
Route::get('courses/{category}',[UserController::class,'courses']);
Route::get('courses',[UserController::class,'allCourses']);


// Get Date Time
Route::get('getDateTime',[AdminController::class,"getDateTime"]);


// Student Section
Route::get('/login',[StudentController::class,'loginIndex']);
Route::post('/login',[StudentController::class,'login']);
Route::get('/signup',[StudentController::class,'signupIndex']);
Route::post('/signup',[StudentController::class,'signup']);


// Admin Section
Route::get('admin',[AdminController::class,"index"]);
Route::post('admin',[AdminController::class,"login"]);
Route::get('admin/logout',[AdminController::class,"logout"]);
Route::get('admin/checkActiveSession',[AdminController::class,"checkActiveSession"]);


// Instructor Section
Route::get('instructor',[InstructorController::class,"index"]);
Route::post('instructor',[InstructorController::class,"login"]);
Route::get('instructor/logout',[InstructorController::class,"logout"]);
Route::get('instructor/checkActiveSession',[InstructorController::class,"checkActiveSession"]);


// Groups
Route::prefix('/')->group(function () {

    // Admin Section
    Route::prefix('admin')->middleware("AdminLogin")->group(function () {

        // User Management Section
        Route::prefix('user_management')->group(function () {

            Route::get('/',[AdminController::class,"list"]);
            Route::get('/create',[AdminController::class,"createIndex"]);
            Route::post('/create',[AdminController::class,"create"]);
            Route::get('/edit/{id}',[AdminController::class,"editIndex"]);
            Route::post('/edit/{id}',[AdminController::class,"edit"]);
            Route::get('/block/{id}',[AdminController::class,"block"]);
            Route::get('/unblock/{id}',[AdminController::class,"unblock"]);
        });

        // Admin's Instructors Section
        Route::prefix('instructors')->group(function () {

            Route::get('/',[InstructorController::class,"list"]);
            Route::get('/create',[InstructorController::class,"createIndex"]);
            Route::post('/create',[InstructorController::class,"create"]);
            Route::get('/edit/{id}',[InstructorController::class,"editIndex"]);
            Route::post('/edit/{id}',[InstructorController::class,"edit"]);
            Route::get('/block/{id}',[InstructorController::class,"block"]);
            Route::get('/unblock/{id}',[InstructorController::class,"unblock"]);

        });

        // Admin's Courses Section
        Route::prefix('courses')->group(function () {

            Route::get('/',[CourseController::class,"list"]);
            Route::get('/create',[CourseController::class,"createIndex"]);
            Route::post('/create',[CourseController::class,"create"]);
            Route::get('/edit/{id}',[CourseController::class,"editIndex"]);
            Route::post('/edit/{id}',[CourseController::class,"edit"]);
            Route::get('/view/{id}',[CourseController::class,"view"]);
            Route::get('/block/{id}',[CourseController::class,"block"]);
            Route::get('/unblock/{id}',[CourseController::class,"unblock"]);


            // Admin's Resources Section
            Route::prefix('resources')->group(function () {

                Route::get('/{course_id}',[ResourceController::class,"list"]);
                Route::get('/{course_id}/create',[ResourceController::class,"createIndex"]);
                Route::post('/{course_id}/create',[ResourceController::class,"create"]);
                Route::get('/{course_id}/edit/{id}',[ResourceController::class,"editIndex"]);
                Route::post('/{course_id}/edit/{id}',[ResourceController::class,"edit"]);
                Route::get('/{course_id}/delete/{id}',[ResourceController::class,"delete"]);
                Route::get('/{course_id}/download/{id}',[ResourceController::class,"download"]);

            });

        });


        // Admin's System Settings Section
        Route::prefix('system_settings')->group(function () {

            Route::get('/global_settings',[AdminController::class,"globalSettingsIndex"]);
            Route::post('/global_settings',[AdminController::class,"globalSettings"]);

        });


    });


    // Instructor Section
    Route::prefix('instructor')->middleware("InstructorLogin")->group(function () {


        // Instructor's Course Section
        Route::prefix('courses')->group(function () {

            Route::get('/',[InstructorCourseController::class,"list"]);
            Route::get('/edit/{id}',[InstructorCourseController::class,"editIndex"]);
            Route::post('/edit/{id}',[InstructorCourseController::class,"edit"]);
            Route::get('/view/{id}',[InstructorCourseController::class,"view"]);

            // Instructor's Resources Section
            Route::prefix('resources')->group(function () {

                Route::get('/{course_id}',[InstructorResourceController::class,"list"]);
                Route::get('/{course_id}/create',[InstructorResourceController::class,"createIndex"]);
                Route::post('/{course_id}/create',[InstructorResourceController::class,"create"]);
                Route::get('/{course_id}/edit/{id}',[InstructorResourceController::class,"editIndex"]);
                Route::post('/{course_id}/edit/{id}',[InstructorResourceController::class,"edit"]);
                Route::get('/{course_id}/delete/{id}',[InstructorResourceController::class,"delete"]);
                Route::get('/{course_id}/download/{id}',[InstructorResourceController::class,"download"]);

            });

        });

    });


});



