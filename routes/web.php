<?php

Route::get('/painel/produtos/tests', 'Painel\ProdutoController@tests');
Route::resource('/painel/produtos', 'Painel\ProdutoController');

Route::group(['namespace' => 'Site'], function(){
    Route::get('/categoria2/{id?}', 'SiteController@categoriaOp');
    Route::get('/categoria/{id}', 'SiteController@categoria');
    Route::get('/contato', 'SiteController@contato');
    Route::get('/', 'SiteController@index');
});

/*
Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function(){
    Route::get('/users', function(){
        return 'Controle de Users';
    });
    Route::get('/financeiro', function(){
        return 'Finaceiro Painel';
    });
    Route::get('/', function(){
        return 'Dashboard';
    });
});

Route::get('/login', function(){
    return 'login';
})->name('login');

Route::get('/categoria2/{idCat?}', function($idCat=1){
    return "Posts da categoria {$idCat}";
});

Route::get('/categoria/{idCat}', function($idCat){
    return "Posts da categoria {$idCat}";
});

Route::get('/nome/nome2/nome3', function(){
    return 'Rota grande';
})->name('rota.nomeada');

Route::any('/any', function(){
    return 'any';
});

Route::match(['get', 'post'], '/match', function(){
    return 'Route match';
});

Route::post('/post', function(){
    return 'Route post';
});

Route::get('/contato', function(){
    return 'Contato';
});

Route::get('/empresa', function(){
    return view('empresa');
});

Route::get('/', function () {
    return redirect()->route('rota.nomeada');
});
*/