<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'modalidade',
        'dias_aula',
        'horario',
        'valor',
        'user_id'
    ];

    protected $casts = [
        'dias_aula' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
