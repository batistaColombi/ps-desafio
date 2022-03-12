<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

use App\Models\Produto;


class ProdutoController extends Controller
{
    private $produtos;
    private $categorias;

    public function __construct(Produto $produtos, Categoria $categorias)
    {
        $this->produtos = $produtos;
        $this->categorias = $categorias;
    }

    public function index()
    {
        $produtos = $this->produtos->all();
        //return view('produto.index', compact('produtos'));
        return view('home', compact('produtos'));
    }


    public function create()  //cadastro
    {
        $categorias = $this->categorias->all();
        return view('produto.crud',compact('categorias'));
    }


    public function store(Request $request)    //cria objeto e mandar pro banco
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->descricao = $request->input('descricao');
        $produto->quantidade = $request->input('quantidade');
        $imagem = $request->file('imagem')->store('produtos', 'public');
        $produto->imagem = $imagem;
        $produto->categoria_id = $request->input('categoria_id');

        $produto->save();

        return redirect(route('produto.index'));
    }

    public function show($id)       //mostrar dados
    {
        $produto = $this->produtos->find($id);
        $categoria = $this->categorias->find($produto->categoria_id);
        $produto->categoria = $categoria->categoria;

        return json_encode($produto);
    }

    public function edit($id)   //pesquisa e retorna uma view
    {
        $categorias = $this->categorias->all();
        $produto = produto::findOrFail($id);
        return view('produto.crud', compact('produto','categorias'));
    }

    public function update(Request $request, $id) //atualiza dados
    {
        $datas = $request->all();
        $produto = $this->produtos->find($id);
        $produto->update($datas);
        return redirect(route('produto.index'));
    }

    public function destroy($id)
    {
        $produto = produto::findOrFail($id);
        $produto->delete();
        return redirect(route('produto.index'))->with('success', 'produto removida com sucesso!');
    }
}