<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Resources\ProdutoResource;

class ProdutoController extends Controller
{
  
    public function index(Request $request)
    {
    //Filtro de entrada

    //Query Padrão

    $query = Produto::with('categoria');

    //Obtem o parametro do filtro
    $filterParameter = $request -> input("filtro");

    //Se nao ha nenhum parametro;
    if ($filterParameter == null) {
        //Retorna todos os produtos
        $produtos = $query->get();
    
    $response = response() ->json ([
        'status' => 200,
        'mensagem' => 'Lista de produtos retornadas',
        'produtos' => ProdutoResource::collection($produtos)
    ],200);
    }

    else{
        //Obtem o nome do filtro e o criterio
        [$filterCriteria, $filterValue] = explode(":", $filterParameter);

        //Se o filtro está adequado
        if($filterCriteria == "nome_da_categoria") {
            //Faz inner join para obter a categoria
            $produtos = $query->join("categorias", "pkcategoria", "=","fkcategoria")
            ->where("nomedacategoria","=", $filterValue) ->get();

            $response = response() ->json ([
                'status' => 200,
                'mensagem' => 'Lista de produtos retornadas - Filtrada',
                'produtos' => ProdutoResource::collection($produtos)
            ],200);
            
        }
        else {
            //Usuario chamou um filtro que não existe, então não há nada a retornar ( Error 406 - Not accepted)
            $response = response()->json([
                'status' => 406,
                'mensagem' => 'Filtro não aceito',
                'produtos' => []
            ],406);
            
        }
        //Retorna a resposta processada
        return ($response);
    }
}
    
    public function create()
    {
        //
    }


   
    public function store(Request $request)
    {
        //
    }

    
    public function show(Produto $produto)
    {
        //
    }

    
    public function edit(Produto $produto)
    {
        //
    }

   
    public function update(Request $request, Produto $produto)
    {
        //
    }

    
    public function destroy(Produto $produto)
    {
        //
    }
}