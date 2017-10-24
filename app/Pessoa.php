<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'id',
        'nome'
    ];

    protected $table = 'pessoas';

    /**
     * Função para relacionar os telefones vinculados a uma pessoa
     * Utiliza o metodo hasMany (Pessoa tem muitos telefones) passando como parametro
     * a classe telefone e o nome da chave_estrangeira da tabela telefone
     */

    public function telefones() {
        return $this->hasMany(Telefone::class, 'pessoa_id');
    }

}
