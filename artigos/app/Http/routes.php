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

Route::get('/', ['as' => 'site.home', 'uses'=>'Site\HomeController@index']);


Route::get('/sobre', ['as' => 'site.sobre', 'uses'=>'Site\PaginaController@sobre']);

Route::get('/contato', ['as' => 'site.contato', 'uses'=>'Site\PaginaController@contato']);

Route::post('/contato/enviar', ['as' => 'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);

Route::get('/artigo/{id}/{titulo?}', ['as' => 'site.artigo','uses'=>'Site\ArtigosController@show']);
Route::get('/artigos/categoria/{id?}', ['as' => 'site.artigos.categoria','uses'=>'Site\ArtigosController@listaArtigosPorCategoriaID']);

Route::get('/busca', ['as' => 'site.busca','uses'=>'Site\HomeController@busca']);

Route::get('/login', ['as' => 'admin.login', function(){
    return view("admin.login.index");
}]);


Route::group(['middleware'=>'auth'], function(){
    Route::get('/admin', ['as' => 'admin.principal', function(){
        return view("admin.principal.index");
    }]);
    
    Route::get('/admin/sair', ['as' => 'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

    Route::get('/admin/usuarios', ['as' => 'admin.usuarios', 'uses'=>'Admin\UsuarioController@index']);
    Route::get('/admin/usuarios/adicionar', ['as' => 'admin.usuarios.adicionar', 'uses'=>'Admin\UsuarioController@adicionar']);
    Route::post('/admin/usuarios/salvar', ['as' => 'admin.usuarios.salvar', 'uses'=>'Admin\UsuarioController@salvar']);
    Route::get('/admin/usuarios/editar/{id}', ['as' => 'admin.usuarios.editar', 'uses'=>'Admin\UsuarioController@editar']);
    Route::put('/admin/usuarios/atualizar/{id}', ['as' => 'admin.usuarios.atualizar', 'uses'=>'Admin\UsuarioController@atualizar']);
    Route::get('/admin/usuarios/excluir/{id}', ['as' => 'admin.usuarios.excluir', 'uses'=>'Admin\UsuarioController@excluir']);
    
    Route::get('/admin/usuarios/papel/{id}', ['as' => 'admin.usuarios.papel', 'uses'=>'Admin\UsuarioController@papel']);
    Route::get('/admin/usuarios/papel/salvar/{id}', ['as' => 'admin.usuarios.papel.salvar', 'uses'=>'Admin\UsuarioController@salvarPapel']);
    Route::get('/admin/usuarios/papel/remover/{id}/{papel_id}', ['as' => 'admin.usuarios.papel.remover', 'uses'=>'Admin\UsuarioController@removerPapel']);
    
    Route::get('/admin/paginas', ['as' => 'admin.paginas', 'uses'=>'Admin\PaginaController@index']);
    Route::get('/admin/paginas/editar/{id}', ['as' => 'admin.paginas.editar', 'uses'=>'Admin\PaginaController@editar']);
    Route::put('/admin/paginas/atualizar/{id}', ['as' => 'admin.paginas.atualizar', 'uses'=>'Admin\PaginaController@atualizar']);
    
    Route::get('/admin/tipos', ['as' => 'admin.tipos', 'uses'=>'Admin\TipoController@index']);
    Route::get('/admin/tipos/adicionar', ['as' => 'admin.tipos.adicionar', 'uses'=>'Admin\TipoController@adicionar']);
    Route::post('/admin/tipos/salvar', ['as' => 'admin.tipos.salvar', 'uses'=>'Admin\TipoController@salvar']);
    Route::get('/admin/tipos/editar/{id}', ['as' => 'admin.tipos.editar', 'uses'=>'Admin\TipoController@editar']);
    Route::put('/admin/tipos/atualizar/{id}', ['as' => 'admin.tipos.atualizar', 'uses'=>'Admin\TipoController@atualizar']);
    Route::get('/admin/tipos/excluir/{id}', ['as' => 'admin.tipos.excluir', 'uses'=>'Admin\TipoController@excluir']);
    
    Route::get('/admin/artigos', ['as' => 'admin.artigos', 'uses'=>'Admin\ArtigoController@index']);
    Route::get('/admin/artigo/adicionar', ['as' => 'admin.artigo.adicionar', 'uses'=>'Admin\ArtigoController@adicionar']);
    Route::post('/admin/artigo/salvar', ['as' => 'admin.artigo.salvar', 'uses'=>'Admin\ArtigoController@salvar']);
    Route::get('/admin/artigo/editar/{id}', ['as' => 'admin.artigo.editar', 'uses'=>'Admin\ArtigoController@editar']);
    Route::put('/admin/artigo/atualizar/{id}', ['as' => 'admin.artigo.atualizar', 'uses'=>'Admin\ArtigoController@atualizar']);
    Route::get('/admin/artigo/excluir/{id}', ['as' => 'admin.artigo.excluir', 'uses'=>'Admin\ArtigoController@excluir']);
    
    
    Route::get('/admin/categorias', ['as' => 'admin.categorias', 'uses'=>'Admin\CategoriaController@index']);
    Route::get('/admin/categoria/adicionar', ['as' => 'admin.categoria.adicionar', 'uses'=>'Admin\CategoriaController@adicionar']);
    Route::post('/admin/categoria/salvar', ['as' => 'admin.categoria.salvar', 'uses'=>'Admin\CategoriaController@salvar']);
    Route::get('/admin/categoria/editar/{id}', ['as' => 'admin.categoria.editar', 'uses'=>'Admin\CategoriaController@editar']);
    Route::put('/admin/categoria/atualizar/{id}', ['as' => 'admin.categoria.atualizar', 'uses'=>'Admin\CategoriaController@atualizar']);
    Route::get('/admin/categoria/excluir/{id}', ['as' => 'admin.categoria.excluir', 'uses'=>'Admin\CategoriaController@excluir']);
    
    
    Route::get('/admin/galerias/{id}', ['as' => 'admin.galerias', 'uses'=>'Admin\GaleriaController@index']);
    Route::get('/admin/galerias/adicionar/{id}', ['as' => 'admin.galerias.adicionar', 'uses'=>'Admin\GaleriaController@adicionar']);
    Route::post('/admin/galerias/salvar/{id}', ['as' => 'admin.galerias.salvar', 'uses'=>'Admin\GaleriaController@salvar']);
    Route::get('/admin/galerias/editar/{id}', ['as' => 'admin.galerias.editar', 'uses'=>'Admin\GaleriaController@editar']);
    Route::put('/admin/galerias/atualizar/{id}', ['as' => 'admin.galerias.atualizar', 'uses'=>'Admin\GaleriaController@atualizar']);
    Route::get('/admin/galerias/excluir/{id}', ['as' => 'admin.galerias.excluir', 'uses'=>'Admin\GaleriaController@excluir']);
    
    Route::get('/admin/slides/', ['as' => 'admin.slides', 'uses'=>'Admin\SlideController@index']);
    Route::get('/admin/slides/adicionar/', ['as' => 'admin.slides.adicionar', 'uses'=>'Admin\SlideController@adicionar']);
    Route::post('/admin/slides/salvar/', ['as' => 'admin.slides.salvar', 'uses'=>'Admin\SlideController@salvar']);
    Route::get('/admin/slides/editar/{id}', ['as' => 'admin.slides.editar', 'uses'=>'Admin\SlideController@editar']);
    Route::put('/admin/slides/atualizar/{id}', ['as' => 'admin.slides.atualizar', 'uses'=>'Admin\SlideController@atualizar']);
    Route::get('/admin/slides/excluir/{id}', ['as' => 'admin.slides.excluir', 'uses'=>'Admin\SlideController@excluir']);
    
    Route::get('/admin/papel/', ['as' => 'admin.papel', 'uses'=>'Admin\PapelController@index']);
    Route::get('/admin/papel/adicionar/', ['as' => 'admin.papel.adicionar', 'uses'=>'Admin\PapelController@adicionar']);
    Route::post('/admin/papel/salvar/', ['as' => 'admin.papel.salvar', 'uses'=>'Admin\PapelController@salvar']);
    Route::get('/admin/papel/editar/{id}', ['as' => 'admin.papel.editar', 'uses'=>'Admin\PapelController@editar']);
    Route::put('/admin/papel/atualizar/{id}', ['as' => 'admin.papel.atualizar', 'uses'=>'Admin\PapelController@atualizar']);
    Route::get('/admin/papel/excluir/{id}', ['as' => 'admin.papel.excluir', 'uses'=>'Admin\PapelController@excluir']);

    Route::get('/admin/papel/permissao/{id}', ['as' => 'admin.papel.permissao', 'uses'=>'Admin\PapelController@permissao']);
    Route::get('/admin/papel/permissao/adicionar/', ['as' => 'admin.papel.permissao.adicionar', 'uses'=>'Admin\PapelController@adicionarPermissao']);
    Route::post('/admin/papel/permissao/{id}/salvar/', ['as' => 'admin.papel.permissao.salvar', 'uses'=>'Admin\PapelController@salvarPermissao']);
    Route::get('/admin/papel/permissao/{id}/editar/{id_permissao}', ['as' => 'admin.papel.permissao.editar', 'uses'=>'Admin\PapelController@editarPermissao']);
    Route::put('/admin/papel/permissao/{id}/atualizar/{id_permissao}', ['as' => 'admin.papel.permissao.atualizar', 'uses'=>'Admin\PapelController@atualizarPermissao']);
    Route::get('/admin/papel/permissao/{id}/remover/{id_permissao}', ['as' => 'admin.papel.permissao.remover', 'uses'=>'Admin\PapelController@removerPermissao']);
});
Route::post('/login', ['as' => 'admin.login', 'uses'=>'Admin\UsuarioController@login']);