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
        $title = "Título teste";

        $xss = '<script>alert("Ataque xss");</script>';

        $var1 = '123';

        $arrayData = [1,2,3,4,5,6,7,8,9,10];

        return view('site.home.index', compact('title', 'xss', 'var1', 'arrayData'));
        //return view('teste', ['teste' => $teste]);
        //return view('teste');
    }

    public function contato(){
        $var1 = 10;
        return view('site.contact.index', compact('var1'));
    }

    public function categoria($id){
        return "Listagem dos posts da categoria: {$id}";
    }

    public function categoriaOp($id = 10){
        return "Listagem dos posts da categoria: {$id}";
    }
}
