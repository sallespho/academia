@extends('template.template')
@section('content')
@section('content_header')
      <h1>Historico\\\\</h1>
@stop
<div class="card card-primary">
    <table id="tbretiradas">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Data</th>    
                <th>Valor</th>        
            </tr>        
        </thead> 
        <tbody>
            @foreach ($historicos as $historico)
                <tr>
                    <td>{{ $historico['descricao'] }}</td>
                    <td>{{ $historico['data'] }}</td>
                    <td>R$ {{ $historico['valor'] }}</td>
                </tr>
            @endforeach
        </tbody>   
    </table>
</div>
@stop