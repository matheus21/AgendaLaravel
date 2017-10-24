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

/**
 * Arquivo de rotas, usado para referenciar as urls do projeto
 * uma rota retorna para uma determinada view (Arquivo blade) dentro da pasta resources/views
 * Também é possivel criar grupos de rotas com um determinado prefixo
 * abaixo temos o grupo 'teste' e uma de suas rotas é teste2,
 * sendo acessada da forma: teste/teste2, ou de modo individual como acima
 *
 */

//Route::group(['prefix' => 'teste'], function() {
//    Route::get('/teste2', function() {
//        return view('teste');
//    });
//});


/**
 * Grupo de rotas com prefixo pessoas. Para acessar um metodo, é passado um parametro com o nome
 * da rota e outro com o nome do controller + '@' + o metodo desejado, dessa forma ele retornará a view correspondente
 * ao acessar no browser
 */

//Route::group(['prefix' => 'pessoas'], function() {
//    Route::get('/', 'PessoasController@index');
//});

/**
 * Criando rotas do projeto
 */


Route::group(['prefix' => 'pessoas'], function() {

    Route::get('/', 'PessoasController@index');
    Route::get('/novo', 'PessoasController@novoView');
    Route::post('/store', 'PessoasController@store');
    Route::post('/update', 'PessoasController@update');
    Route::get('/{id}/editar', 'PessoasController@editarView');
    Route::get('/{id}/excluir', 'PessoasController@excluirView');
    Route::get('/{id}/destroy', 'PessoasController@destroy');

});