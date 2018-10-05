<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
public function __construct(){
    //$this->middleware('auth');

    /*$this->middleware('auth')
        ->only([
            'contato',
            'categoria'
        ]);*/
    /*$this->middleware('auth')
            ->except([
                'index',
                'contato'
            ]);*/
}

    public function index(){
        return 'Home Page do Site';
    }

    public function contato(){
        return 'Contato';
    }

    public function categoria($id){
        return "Listagem dos posts da categoria: {$id}";
    }

    public function categoriaOp($id = 10){
        return "Listagem dos posts da categoria: {$id}";
    }
}
