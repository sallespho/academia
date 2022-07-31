@extends('template/template')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<h1>Turmas</h1>
<div class="card card-primary">
    <table id="tbturmas" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>modalidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turmas as $turma)
            @can('ver-turma', $turma)
            <tr>            
                <td>{{$turma['nome']}}</td>
                <td>{{$turma['modalidade']}}</td>           
                <td>
                    <a class="btn btn-primary" href="{{ route('turma.matricula', $turma['id']) }}">Matriculas <i class="fas fa-graduation-cap"></i></a>
                    <a class="btn btn-info" href="{{ route('aluno_turma.aluno', $turma['id']) }}">Alunos <i class="fas fa-users "></i></a>
                    <a class="btn btn-success" href="{{ route('detalhe.turma', $turma['id']) }}">Detalhes <i class="nav-icon fas fa-book"></i></a>
                </td>
            </tr>
            @endcan
            @endforeach   
        </tbody>
    </table>
</div>
@stop