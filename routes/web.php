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

// Rota principal do sistema
Route::get('/', 'usuariosController@index');

// Rota para o formulário de login
Route::get('/login', 'usuariosController@frmLogin');

// Rota para checar o login
Route::post('/logar', 'usuariosController@logar');

// Rota para fazer logout
Route::get('/logout', 'usuariosController@logout');


// Rota para recuperar a senha
Route::get('/recovery', 'usuariosController@recovery');

// Rota para executar o recovery
Route::post('/exec_recovery', 'usuariosController@execRecovery');

// Rota para informar que a recuperação de senha ocorreu com sucesso
Route::get('/usuario_email_enviado', 'usuariosController@emailEnviado');

// Rota para criação de usuário
Route::get('/create_user', 'usuariosController@createUser');

// Rota para a execução de conta do usuário
Route::post('/exec_create_user', 'usuariosController@executarCreateUser');


// Rota sistema
Route::get('/app_index', 'aplicacaoController@showIndex');