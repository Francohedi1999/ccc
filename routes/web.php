<?php

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


// Route::view('/login' , 'login'); // url: "/login" , view: "login.blade.php"
Route::get('/login', 'Session_controller@index')->name('login');
Route::post('/login', 'Session_controller@login')->name('login');


Route::group( [ 'middleware' => [ 'session' ] ] , function ()
{
    Route::get('/principale', 'Principale_controller@index')->name('principale');

    // Enseignant
    Route::get('/enseignant/liste', 'Enseignant_controller@index')->name('enseignants');
    Route::get('/enseignant/ajout', 'Enseignant_controller@create')->name('ajout_enseignant');
    Route::post('/enseignant/enregistrer', 'Enseignant_controller@save')->name('save_enseignant');
    Route::get('/enseignant/edit/{id}', 'Enseignant_controller@edit')->name('edit_enseignant');
    Route::post('/enseignant/modifier', 'Enseignant_controller@update')->name('update_enseignant');

    // EC Enseignant
    Route::get('/element_constitutif/liste', 'EC_controller@index')->name('ecs');
    Route::get('/element_constitutif/ajout', 'EC_controller@create')->name('ajout_ec');
    Route::post('/element_constitutif/enregistrer', 'EC_controller@save')->name('save_ec');
    Route::get('/element_constitutif/edit/{id}', 'EC_controller@edit')->name('edit_ec');
    Route::post('/element_constitutif/modifier', 'EC_controller@update')->name('update_ec');

    // REGROUPEMENT
    Route::get('/regroupement/liste', 'Regroupement_controller@index')->name('regroupements');
    Route::get('/regroupement/ajout', 'Regroupement_controller@create')->name('ajout_regroupement');
    Route::post('/regroupement/enregistrer', 'Regroupement_controller@save')->name('save_regroupement');
    Route::get('/regroupement/validations', 'Regroupement_controller@validation')->name('validation_regroupement');
    Route::get('/regroupement/validation/{id}', 'Regroupement_controller@validate_regroupement')->name('valide_regroupement');

    Route::get('/logout', 'Session_controller@logout')->name('logout');
});
