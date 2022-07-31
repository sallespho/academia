@extends('template/template')
@section('content')

@section('content_header')
      <h1>Lista de alunos</h1>
@stop
<div class="card card-primary">
    <h4>Turma: {{ $turma['nome'] }}</h4>
    <table id="tbAlunoTurma" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
                <td>{{ $aluno['nome'] }}</td>
                <td>{{ $aluno['cpf'] }}</td>
                <td> <a class="btn btn-danger" href="">Remover</a> </td>
            </tr>
            @endforeach        
        </tbody>
    </table>
</div>
@stop