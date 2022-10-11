<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    //campos publicáveis(preenchíveis)
    protected $fillable = ['nomedoproduto','anodomodelo','precodelista'];

    //nome da chave primária
    protected $primaryKey = 'pkproduto';

    //nome da tabela
    protected $table = 'produtos';

    //informa que está trabalhando com incremento
    public $incrementing = true;

    //não utiliza timestamps nos controles (created & updated)
    public $timestamps = false;


public function categoria() {
    return $this->belongsTo(Categoria::class, 'fkcategoria', 'pkcategoria');

}

}