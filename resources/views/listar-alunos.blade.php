@extends('template/template')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
</div>
@section('content_header')
      <h1>Lista de alunos</h1>
@stop
<div class="card card-primary">
  <div class="col-12 center">
    <table id="tbalunos" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Turma</th>
                <th>Ações</th>
                <th>id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>            
                <td>{{$aluno['nome']}}</td>
                <td>{{$aluno['cpf']}}</td>
                @if ($aluno['turma_id'] == NULL)
                    <td>sem matricula</td>               
                @else
                    <td>{{$aluno->turma['nome']}}</td>
                @endif            
                <td>
                    <a class="btn btn-primary" href="{{route('aluno.show', $aluno['id'])}}">Detalhes <i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a class="btn btn-info" href="{{route('aluno.edit', $aluno['id'])}}">Editar <i class="fa fa-edit" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-del-alunos" data-nome-aluno={{$aluno['nome']}} data-aluno_id={{$aluno['id']}}>Deletar</button>
                </td>
                <td class="aluno_id">{{$aluno['id']}}</td>
            </tr>
            @endforeach   
        </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="modal-del-alunos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@stop 