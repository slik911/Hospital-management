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
    return view('welcome');
});

Route::get('/appointment', 'AppointmentController@index')->name('appointment.index');
Route::get('/appointment/confirm', 'AppointmentController@track')->name('appointment.track');
Route::post('/appointment/book', 'AppointmentController@book')->name('appointment.book');
Route::post('/appointment/confirm', 'AppointmentController@confirm')->name('appointment.confirm');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/staff', 'AdminController@staff')->name('admin.staff');
    Route::post('/admin/staff/register', 'AdminController@create')->name('staff.create');
    Route::get('/admin/staff/show', 'AdminController@show')->name('staff.show');
    Route::put('/admin/staff/update', 'AdminController@update')->name('staff.update');
    Route::get('/admin/staff/{id}/status', 'AdminController@block')->name('staff.block');
    Route::get('//admin/staff/{id}/delete', 'AdminController@delete')->name('staff.delete');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    });

Route::group(['middleware' => 'App\Http\Middleware\ClerkMiddleware'], function() {
    Route::get('/clerk', 'ClerkController@index')->name('clerk.index');
    Route::get('/clerk/profile', 'ClerkController@profile')->name('clerk.profile');
    Route::get('/clerk/patient', 'ClerkController@patient')->name('clerk.patient');
    Route::post('/clerk/patient/register', 'PatientController@create')->name('patient.create');
    Route::get('/clerk/patient/registeration/success', 'ClerkController@success')->name('patient.success');
    Route::get('/clerk/patient/{id}/delete', 'PatientController@delete')->name('patient.delete');
    Route::put('/clerk/patient/update', 'PatientController@update')->name('patient.update');
    Route::get('/clerk/patient/{id}/admissionHistory', 'PatientController@history')->name('patient.history');
    Route::get('/patient/admit/show', 'PatientController@showAdmit')->name('admit.show');
    Route::post('/patient/ward/transfer', 'PatientController@transfer')->name('patient.transfer');
    Route::get('/clerk/patient/{id}/history/delete', 'PatientController@historyDelete')->name('history.delete');

    Route::get('/clerk/appointment', 'ClerkController@appointment')->name('clerk.appointment');
    Route::get('/patient/{id}/details', 'PatientController@view')->name('patient.view');
    });

    Route::group(['middleware' => 'App\Http\Middleware\DoctorMiddleware'], function() {
        Route::get('/doctor', 'DoctorController@index')->name('doctor.index');
        Route::get('/doctor/profile', 'DoctorController@profile')->name('doctor.profile');
        Route::get('/doctor/patient', 'DoctorController@patient')->name('doctor.patient');
        Route::post('/doctor/patient/diagnosis', 'DoctorController@diagnosis')->name('doctor.diagnosis');
        Route::get('/doctor/patient/{id}/diagnosis/view', 'DoctorController@viewDiagnosis')->name('doctor.viewDiagnosis');
        Route::get('/doctor/patient/diagnosis/show', 'DoctorController@show')->name('diagnosis.show');
        Route::put('/doctor/diagnosis/update', 'DoctorController@update')->name('diagnosis.update');
        Route::get('/doctor/diagnosis/{id}/delete', 'DoctorController@delete')->name('diagnosis.delete');
        Route::get('/doctor/appointment', 'DoctorController@appointment')->name('doctor.appointment');
        Route::get('/doctor/appointment/{id}/approve', 'DoctorController@approve')->name('appointment.approve');

        Route::get('/doctor/appointment/{id}/delete', 'DoctorController@deleteAppointment')->name('appointment.delete');
        Route::get('/doctor/{id}/status', 'DoctorController@check')->name('doctor.check');
        Route::get('/doctor/patient/{id}/details', 'DoctorController@view')->name('patient.view');
     });


    Route::get('/patient/show', 'PatientController@show')->name('patient.show');
    Route::post('/patient/admit', 'PatientController@admit')->name('patient.admit');
    Route::get('/patient/{id}/discharge', 'PatientController@discharge')->name('patient.discharge');
    Route::get('/patient/diagnosis/show', 'DoctorController@show')->name('diagnosis.show');
    Route::get('/appointment/read', 'DoctorController@read')->name('appointment.read');




    Route::group(['middleware' => 'App\Http\Middleware\NurseMiddleware'], function() {
            Route::get('/nurse', 'NurseController@index')->name('nurse.index');
            Route::get('/nurse/patient', 'NurseController@patient')->name('patient.nurse');
            Route::get('/nurse/patient/{id}/diagnosis/view', 'NurseController@viewDiagnosis')->name('nurse.viewDiagnosis');
            Route::get('/nurse/profile', 'NurseController@profile')->name('nurse.profile');
            Route::get('/nurse/patient/{id}/details', 'NurseController@view')->name('nurse.view');
        });

        Route::put('/profile/update', 'ProfileController@update')->name('profile.update');
        Route::put('/profile/password/change', 'ProfileController@password')->name('profile.password');
