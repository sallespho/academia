@extends('template.template')
@section('content')

@section('content_header')
      <h1>Historico</h1>
@stop
<div class="card card-primary">
    <table id="tbretiradas">
    <thead>
        <tr>
            <th>Aluno</th>
            <th>Data</th>    
            <th>Valor</th>        
        </tr>        
    </thead> 
    <tbody>
        @foreach ($entradas as $entrada)
            <tr>
                <td>{{ $entrada->aluno['nome'] }}</td>
                <td>{{ $entrada['data'] }}</td>
                <td> <h1 class="badge bg-success">R$ {{ $entrada['valor'] }}</h1></td>
            </tr>
        @endforeach
    </tbody>   
</table>
</div>
@stop