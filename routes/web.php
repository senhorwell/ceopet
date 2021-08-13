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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {

	Route::get('paciente/consulta', 'App\Http\Controllers\PacienteController@consultar')->name('paciente.consulta');
	Route::post('paciente/consulta/prontuario', 'App\Http\Controllers\PacienteController@consultarProntuario')->name('paciente.consulta.prontuario');
	
	Route::get('paciente/registra', 'App\Http\Controllers\PacienteController@registra')->name('paciente.registra.get');
	Route::post('paciente/registrar', 'App\Http\Controllers\PacienteController@registrar')->name('paciente.registra');
	Route::put('paciente/registrar', 'App\Http\Controllers\PacienteController@registrar')->name('paciente.registra');

	Route::get('user/dados', 'App\Http\Controllers\ProfileController@dados')->name('profile.dados');
	Route::get('credenciado', 'App\Http\Controllers\ProfileController@dados')->name('credenciado.dados');
	Route::post('credenciado/registra', 'App\Http\Controllers\ProfileController@registrarCredenciado')->name('credenciado.registrar');

	Route::get('atendimento/registra', 'App\Http\Controllers\AtendimentoController@registrar')->name('atendimento.registra');
	Route::post('atendimento/registra', 'App\Http\Controllers\AtendimentoController@registrarProntuario')->name('atendimento.registra.prontuario');
	Route::post('atendimento/consulta/excel', 'App\Http\Controllers\AtendimentoController@excel')->name('atendimento.consulta.excel');

	Route::get('atendimento/consulta', 'App\Http\Controllers\AtendimentoController@consultar')->name('atendimento.consulta');

	Route::get('procedimento/registra', 'App\Http\Controllers\ProcedimentoController@registrar')->name('procedimento.registra');
	Route::post('procedimento/registra', 'App\Http\Controllers\ProcedimentoController@registrarSalvar')->name('procedimento.registra.salvar');
	Route::delete('procedimento/registra/deletar', 'App\Http\Controllers\ProcedimentoController@deletar')->name('procedimento.registra.delete');

	Route::get('plano/registra', 'App\Http\Controllers\PlanoController@registrar')->name('plano.registra');
	Route::delete('plano/registra/deletar', 'App\Http\Controllers\PlanoController@deletar')->name('plano.registra.delete');
	Route::post('plano/registra/salvar', 'App\Http\Controllers\PlanoController@registrarSalvar')->name('plano.registra.salvar');
	
	Route::post('plano/carencia/registra', 'App\Http\Controllers\PlanoController@registrarCarencia')->name('plano.carencia.registra');
	Route::post('plano/carencia/registra/salvar', 'App\Http\Controllers\PlanoController@registrarCarenciaSalvar')->name('plano.carencia.registra.salvar');
	Route::delete('plano/carencia/registra/delete', 'App\Http\Controllers\PlanoController@registrarCarenciaDeletar')->name('plano.carencia.registra.deletar');
	Route::get('plano/carencia/registra', 'App\Http\Controllers\PlanoController@registrarCarencia')->name('plano.carencia.consulta');

	Route::get('banner/registra', 'App\Http\Controllers\BannerController@bannerRegistra')->name('banner.registra');
	Route::post('banner/registra', 'App\Http\Controllers\BannerController@bannerRegistraSalvar')->name('banner.registra.salvar');
	Route::delete('banner/registra/deletar', 'App\Http\Controllers\BannerController@deletar')->name('banner.registra.delete');

	



	Route::get('tutor', 'App\Http\Controllers\ProfileController@tutor')->name('tutor.dados');
	Route::post('tutor/registra', 'App\Http\Controllers\ProfileController@registrarTutor')->name('tutor.registrar');

});
Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

