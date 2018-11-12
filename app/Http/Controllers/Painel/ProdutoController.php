<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller {

    private $product;
    private $totalPage = 3;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function index() {
        $title = 'Listagem dos Produtos';
        
        //$products = $this->product->all();
        $products = $this->product->paginate($this->totalPage);

        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = 'Cadastrar Novo Produto';
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request) {
        
        //dd($request->all());
        //dd($request->only(['name', 'number']));
        //dd($request->except(['_token', 'category']));
        //dd($request->input('name'));
        
        $dataForm = $request->all();
        
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        
        //Validação
        //$this->validate($request, $this->product->rules);
        /*$messages = [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'number.numeric' => 'Precisa ser apenas números!',
            'number.required' => 'O campo número é de preenchimento obrigatório!'
        ];
         * 
         *
        
        $validate = validator($dataForm, $this->product->rules);
        if($validate->fails()){
            return redirect()->route('produtos.create')->withErrors($validade)->withInput();
        }
         * 
         */
        
        //Faz o cadastro
        $insert = $this->product->create($dataForm);
        
        if($insert){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->route('produtos.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = $this->product->find($id);
        
        $title = 'Produto: '.$product->name;
        
        return view('painel.products.show', compact('title', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = $this->product->find($id);
        $title = 'Editar Produto: '.$product->name;
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'categorys', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id) {
        
        //Recupera todos os dados do formulário
        $dataForm = $request->all();
        
        //Recupera o item para editar
        $product = $this->product->find($id);
        
        //Verifica se o produto está ativo
        $dataForm['active'] = (!isset($dataForm['active']))? 0 : 1;
        
        //Altera os itens
        $update = $product->update($dataForm);
        
        //Verifica se realmente editou        
        if($update){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        $product = $this->product->find($id);
        
        $delete = $product->delete();
        
        if($delete){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }

    public function tests() {
        /*
          $prod = $this->product;
          $prod->name = 'Nome do Produto';
          $prod->number = 123321;
          $prod->active = true;
          $prod->category = 'eletronicos';
          $prod->description = 'Descricao do Produto aqui';
          $insert = $prod->save();

          if($insert){
          return 'Inserido com sucesso';
          }else{
          return 'Falha ao inserir';
          }
         * 

          $insert = $this->product->create([
          'name' => 'Nome do Produto 3',
          'number' => 123321,
          'active' => false,
          'category' => 'eletronicos',
          'description' => 'Descricao do Produto aqui'
          ]);

          if ($insert) {
          return 'Inserido com sucesso. ID: '.$insert->id;
          } else {
          return 'Falha ao inserir';
          }
         * 
         *
          $prod = $this->product->find(5);
          //dd($prod);
          $prod->name = 'Nome 2';
          $prod->number = 74125;
          $prod->active = true;
          $prod->category = 'eletronicos';
          $prod->description = 'Descricao';

          $update = $prod->save();
          if($update){
          return 'Alterado com sucesso';
          }else{
          return 'Falha ao alterar.';
          } *
        $prod = $this->product->find(6);
        $update = $prod->update([
            //Só é necessário passar o que quiser alterar
            'name' => 'Update 2',
            'number' => 123321,
            'active' => false,
            'category' => 'eletronicos',
            'description' => 'Descricao do Produto aqui'
        ]);

        if ($update) {
            return 'Alterado com sucesso';
        } else {
            return 'Falha ao alterar.';
        }*
        $prod = $this->product->where('number', '=', 74125);//where('number', 74125)
        $update = $prod->update([
            //Só é necessário passar o que quiser alterar
            'name' => 'Update 2',
            'number' => 123321,
            'active' => false,
            'category' => 'eletronicos',
            'description' => 'Descricao do Produto aqui'
        ]);

        if ($update) {
            return 'Alterado com sucesso';
        } else {
            return 'Falha ao alterar.';
        }*/
        
        $prod = $this->product->find(3);
        //delete = $this->product->where('number', 524)->delete();
        //$prod = $this->product->destroy([1,2,5]);
        $delete = $prod->delete();
        
        if($delete){
            return 'Deletado com sucesso';
        }else{
            return 'Erro ao deletar';
        }
    }

}
