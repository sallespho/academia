<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Hett\Requests;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\User;

class AlunoController extends Controller
{
    public function __construct(Aluno $aluno, Turma $turma, User $user)
    {
        $this->aluno = $aluno;
        $this->turma = $turma;
        $this->user = $user;
    }
    
    public function create()
    {
        return view('cadastro_aluno');
    }

    /*
        'name',
        'email',
        'password',
        'funcao'
    */

    public function store(AlunoRequest $alunoRequest)
    {
        
        $dados = $alunoRequest->all();
        $password = substr($dados['cpf'], 0, 3) . substr($dados['data_nascimento'], -4);
        /*
        $dados_user =
        [
            'name'     => $dados['nome'],
            'email'    => $dados['email'],
            'password' => $password,
            'funcao'   => 'aluno',
        ]
        */
        $aluno = $this->aluno;
        $aluno->nome = $alunoRequest['nome'];
        $aluno->responsavel_financeiro = $alunoRequest['responsavel_financeiro'];
        $aluno->data_nascimento = $alunoRequest['data_nascimento'];
        $aluno->altura = $alunoRequest['altura'];
        $aluno->cpf = $alunoRequest['cpf'];
        $aluno->celular = $alunoRequest['celular'];
        $aluno->celular_responsavel = $alunoRequest['celular_responsavel'];
        $aluno->celular_financeiro = $alunoRequest['celular_financeiro'];
        $aluno->bairro = $alunoRequest['celular_financeiro'];
        $aluno->rua = $alunoRequest['rua'];
        $aluno->bairro = $alunoRequest['bairro'];
        $aluno->n_casa = $alunoRequest['n_casa'];
        $aluno->instagram = $alunoRequest['instagram'];
        $aluno->observacao = $alunoRequest['observacao'];
        $aluno->cuidado_especial = $alunoRequest['cuidado_especial'];
        $aluno->dia_pagamento = $alunoRequest['dia_pagamento'];
        $this->aluno->save();
        //dd($this->aluno->id);
        $this->user->email = $alunoRequest['email'];
        $this->user->password = $password;
        $this->user->funcao = 'aluno';
        $this->user->name = $alunoRequest['nome'];
        $this->user->aluno_id = $this->aluno->id;
        $this->user->save();

        
        //$this->aluno->create($dados);          
        //$this->user->create($dados_user);      
        return redirect()->route('aluno.index');
    }

    public function index()
    {
        $alunos = $this->aluno->all();
        return view('listar-alunos', compact('alunos'));
    }

    public function edit($id)
    {
        if(!$aluno = $this->aluno->find($id))
        {
            return redirect()->route('aluno.index');
        }
        return view('editar-aluno', compact('aluno'));
    }

    public function update(AlunoRequest $request, $id)
    {
        if(!$aluno = $this->aluno->find($id))
        {
            return redirect()->route('aluno.index');
        } 
        $data = $request->all();
        $aluno->update($data);
        return redirect()->route('aluno.index')->with('status', 'Atualização realizada com sucesso!!!');
    }

    public function show($id)
    {
        if(!$aluno = $this->aluno->find($id))
        {
            return redirect()->route('aluno.index');
        }
        return view('detalhes-aluno', compact('aluno'));                
    }

    public function efetivar_matricula (Request $request)
    {
        $dados = $request->all();
        $aluno_id = $request['id'];
        if(!$aluno = $this->aluno->find($aluno_id))
        {
            return redirect()->route('aluno.index');
        }
        $turma['turma_id'] = $dados['turma_id'];
        $aluno->update($turma);
        return redirect()->route('turma.matricula', $turma['turma_id'])->with('status', $aluno['nome'] . ' ' . 'Matriculado com sucesso!' );
    }

    public function aluno_turma($id)
    {
        $alunos = $this->aluno->where('turma_id', $id)->get();
        $turma = $this->turma->find($id);
        if($alunos == Null)
        {
           return redirect()->route('aluno.index'); 
        }
       
        return view('aluno_turma', compact('alunos', 'turma'));
    }

}
