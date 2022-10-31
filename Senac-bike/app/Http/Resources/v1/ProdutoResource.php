<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    //Mantido para documentação
    //return parent::toArray($request);

    public function toArray($request)
    {
        return [
            'id' =>$this->pkproduto,
            'nome_do_produto' => $this->nomedoproduto,
            'preco_de_lista'=>$this->precodelista,
            'categoria' => [
                'id' =>$this->categoria->pkcategoria,
                'nome_da_categoria' => $this->nomedacategoria
                ]   
        ];
    }
}
