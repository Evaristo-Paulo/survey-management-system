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
Route::name('auth.')->group(function () {
    Route::post('/auth', 'AuthController@login')->name('login');
    Route::get('/logout', 'AuthController@logout')->name('logout')->middleware('auth');
});

Route::name('user.')->group(function () {
    Route::post('/usuarios/registo', 'UserController@user_register_save')->name('register.save');
});

Route::name('survey.')->group(function () {
    Route::get('/', 'SurveyController@index')->name('index');
    Route::get('/minhas-enquetes', 'SurveyController@my_surveis')->name('mine')->middleware('auth');
    Route::get('/enquetes/{id}/faca-a-sua-votacao/', 'SurveyController@vote')->name('vote.form');
    Route::post('/enquetes/{id}/faca-a-sua-votacao/', 'SurveyController@vote_save')->name('vote.save');
    Route::get('/enquetes/{id}/detalhes', 'SurveyController@survey_details')->name('details');
    Route::get('/enquetes/registo', 'SurveyController@survey_register_form')->name('register.form')->middleware('auth');
    Route::post('/enquetes/registo', 'SurveyController@survey_register_save')->name('register.save')->middleware('auth');
    Route::get('/enquetes/{id}/actualizacao', 'SurveyController@survey_edit_form')->name('edit.form')->middleware('auth');
    Route::put('/enquetes/{id}/actualizacao', 'SurveyController@survey_update')->name('update')->middleware('auth');
    Route::delete('/enquetes/remocao', 'SurveyController@survey_delete')->name('delete')->middleware('auth');
    Route::get('/enquetes/{id}/alternativas-de-perguntas/remocao', 'SurveyController@survey_option_delete')->name('option.delete')->middleware('auth');
});
