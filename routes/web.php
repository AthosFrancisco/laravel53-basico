<?php

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
