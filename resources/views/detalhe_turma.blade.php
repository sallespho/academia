@extends('template/template')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        @section('content_header')
            <h1>Detalhes</h1>
        @stop
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $turma->nome }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Modalidade: </label>
                    <i>{{ $turma->modalidade }} </i>
                </div>
                <div class="form-group">
                    <label>Dias de aula: </label>
                    @foreach ($dias as $dia)
                    <i>{{$dia}} - </i>
                    @endforeach                        
                </div>  
                <div class="form-group">
                    <label>Horário: </label>
                    <i>{{ $turma->horario }}</i>
                </div>
                <div class="form-group">
                    <label>Valor: </label>
                    <i>R$ {{ $turma->valor }}</i>
                </div>
                <div class="form-group">
                    <label>Professor: </label>
                    <i>{{ $turma->user->name }}</i>
                </div>
            </div>
        </div>
    </div>
</div>
@stop