<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [

        'id',
        'ddd',
        'telefone',
        'pessoa_id'
    ];

    protected $table = 'telefones';

    /**
     * Função para relacionar o telefone pertencente a uma pessoa
     * Utiliza o metodo belongsTo (telefone pertence a uma pessoa) passando como parametro
     * a classe pessoa e o nome da chave_estrangeira da tabela telefone
     */

    public function pessoa() {

        return $this->belongsTo(Pessoa::class, 'pessoa_id');

    }

}
