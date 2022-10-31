<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Http\Resources\CategoriaResource;
use App\Http\Requests\StoreCategoriaRequest;


class CategoriaController extends Controller
{
  
    public function index(Request $request)
    {

        //Captura a coluna para ordenação
        $sortParameter = $request->input('ordenacao', 'nome_da_categoria');
        $sortDirection = Str::startsWith($sortParameter,'-') ? 'desc':'asc';
        $sortColumn = ltrim($sortParameter,'-');

        //Determina se faz a query ordenada ou aplica o default
        if($sortColumn == 'nome_da_categoria') {
            $categorias = Categoria::orderBy('nomedacategoria', $sortDirection)->get();
        }

        else {
            $categorias = Categoria::all();
        }

        return response() -> json ([
            'status' => 200,
            'mensagem' => 'Lista de categorias retornada',
            'categorias' => CategoriaResource::collection($categorias)
        ],200);
    }

    
    public function create()
    {
        //
    }

    
    public function store(StoreCategoriaRequest $request)
    {
        //cria o objeto
        $categoria = new Categoria();

        //Transfere os valores
        $categoria->nomedacategoria = $request->nome_da_categoria;

        //Salva
        $categoria->save();

        //Retorna o resultado
        return response () -> json ([
            'status' => 200,
            'mensagem' => 'Categoria Criada',
            'categoria' => new CategoriaResource($categoria)
        ],200);
    }

    
    public function show(Categoria $categoria)
    {
        //
    }

    public function edit(Categoria $categoria)
    {
        //
    }

    
    public function update(StoreCategoriaRequest $request, Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->pkcategoria);
        $categoria -> nomedacategoria = $request->nome_da_categoria;
        $categoria->update();
        
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Categoria Atualizada'
        ], 200);
    }

    
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response() -> json ([
            'status' => 200,
            'mensagem' => 'Categoria Apagada'
        ], 200);
    }
}
