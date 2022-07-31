<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Historico;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'responsavel_financeiro',
        'data_nascimento',
        'altura',
        'cpf',
        'celular',
        'celular_responsavel',
        'celular_financeiro',
        'bairro',
        'rua',
        'n_casa',
        'instagram',
        'observacao',
        'cuidado_especial',
        'dia_pagamento',
        'turma_id'
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }

    public function historico()
    {
        return $this->hasMany(Historico::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}