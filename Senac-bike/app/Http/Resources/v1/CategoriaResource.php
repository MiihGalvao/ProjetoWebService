<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    //Mantido para documentação
    //return parent::toArray($request);

    public function toArray($request)
    {
        return [
            'id' =>$this->pkcategoria,
            'nome_da_categoria' => $this->nomedacategoria
        ];
        }     
    
}
