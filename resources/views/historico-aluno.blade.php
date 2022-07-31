@extends('template/template')
@section('content')
<h3>Aluno: {{ $aluno['nome'] }}</h3>
<table id="tbhistorico_aluno" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Valor</th>
            <th>Data</th>
            <th>Número de parcelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($historicos as $historico)
            <tr>
                <td>R$ {{ number_format($historico['valor'], 2, ',', '.') }} </td>
                <td> {{date('d-m-Y', strtotime($historico['data']))}} </td>
                <td> {{$historico['n_parcelas_pagas']}} </td>
            </tr>            
        @endforeach
    </tbody>
</table>
@stop