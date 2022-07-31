<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;

class Historico extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'tipo',
        'valor',
        'data',
        'n_parcelas_pagas',
        'descricao'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
