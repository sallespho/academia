<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\models\User;
use App\Models\Aluno;
use App\Http\Requests\TurmaRequest;


class TurmaController extends Controller
{
    public function __construct(Turma $turma, User $users, Aluno $alunos)
    {
        $this->turma = $turma;
        $this->users = $users;
        $this->alunos = $alunos;
    }

    public function create()
    {
        $usuarios = $this->users->get();
        return view('cadastro_turma', compact('usuarios'));
    } 
    
    public function store(TurmaRequest $request)
    {
        $dados = $request->all();
        $dados['dias_aula'] = serialize($dados['dias_aula']);
        $this->turma->create($dados);
        return redirect()->route('turma.index')->with('status', 'Nova Turma cadastrada!');
    }

    public function index()
    {        
        $turmas = $this->turma->all();        
        return view('listar-turmas', compact('turmas'));
    }

    public function matricula($id)
    {
        $alunos = $this->alunos->where('turma_id', Null)->get();  
        $turma  = $this->turma->find($id);
        return view('matricula', compact('alunos', 'turma'));
    }

    public function detalhe_turma($id)
    {
        if(!$turma = $this->turma->find($id))
        {
            return view('index.turma');
        }
        $dias = unserialize($turma['dias_aula']);
        $this->authorize('ver-turma', $turma);
        return view('detalhe_turma', compact('turma', 'dias'));
    }
}
