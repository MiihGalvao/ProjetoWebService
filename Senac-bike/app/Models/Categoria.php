<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //campos publicáveis(preenchiveis)
    protected $fillable = ['nomedacategoria'];

    //nome da chave primária
    protected $primaryKey = 'pkcategoria';

    //nome da tabela
    protected $table = 'categorias';

    //informa que está trabalhando com incremento
    public $incrementing = true;

    //não utiliza timestamps nos controles (created & updated)
    public $timestamps = false;
}
