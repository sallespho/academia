@extends('template/template')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1>Matricula turma {{ $turma['nome'] }}</h1>
<table id="tbMatricula" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Matricula</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alunos as $aluno)
            <tr>
                <td> {{ $aluno['nome'] }}</td>
                <td> {{ $aluno['cpf']  }}</td>                
                <td>                    
                    <form action="{{ route("efetivar-matricula.aluno") }}" method="post">
                        @method('PUT')
                        @csrf                        
                        <input type="hidden" name="turma_id" value="{{ $turma['id'] }}">
                        <input type="hidden" name="id" value="{{ $aluno['id'] }}">
                        <button class="btn btn-primary" type="submit">Matricular</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach



    </tbody>


</table>
@stop