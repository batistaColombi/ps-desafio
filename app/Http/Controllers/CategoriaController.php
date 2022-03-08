<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    private $categorias;

    public function __construct(Categoria $categorias)
    {
        $this->categorias = $categorias;
    }


    public function index() //exibição
    {
        $categorias = $this->categorias->all();
        return view('categoria.index', compact('categorias'));
    }


    public function create()  //cadastro
    {
        return view('categoria.crud');
    }


    public function store(Request $request)    //cria objeto e mandar pro banco
    {
        $datas = $request->all();
        $this->categorias->create($datas);

        return redirect(route('categoria.index'));
    }

    public function edit($id)   //pesquisa e retorna uma view
    {
        $categoria = categoria::findOrFail($id);
        return view('categoria.crud', compact('categoria'));
    }

    public function update(Request $request, $id) //
    {
        $datas = $request->all();
        $categoria = $this->categorias->find($id);
        $categoria->update($datas);
        return redirect(route('categoria.index'));
    }

    public function destroy($id)
    {
        $categoria = categoria::findOrFail($id);
        $categoria->delete();
        return redirect(route('categoria.index'))->with('success', 'Categoria removida com sucesso!');
    }
}
