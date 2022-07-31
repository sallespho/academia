@extends('template/template')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        @section('content_header')
            <h1>Detalhes</h1>
        @stop        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @include('includes.validationform')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $aluno->nome }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>CPF: <i>{{$aluno->cpf}}</i></label>
                </div>
                <div class="form-group">
                    <label>Responsavel Financeiro: <i>{{$aluno->responsavel_financeiro}}</i></label>
                </div>
                <div class="form-group">
                    <label>Data de Nascimento: <i> {{$aluno->data_nascimento}}</i></label>
                </div>
                <div class="form-group">
                    <label>Altura: <i> {{$aluno->altura}}</i></label>
                </div>
                <div class="form-group">
                    <label>Celular: <i> {{$aluno->celular}}</i></label>
                </div>
                <div class="form-group">
                    <label>Celular Responsável: <i>{{$aluno->celular_responsavel}}</i></label>
                </div>
                <div class="form-group">
                    <label>Celular Responsável Financeiro: <i> {{$aluno->celular_financeiro}}</i></label>
                </div>
                <div class="form-group">
                    <label>CPF Responsável: <i> {{$aluno->cpf_responsavel}}</i></label>
                </div>
                <div class="form-group">
                    <label>Rua: <i> {{$aluno->rua}}</i></label>
                </div>
                <div class="form-group">
                    <label>Bairro: <i> {{$aluno->bairro}}</i></label>
                </div>
                <div class="form-group">
                    <label>Numero Casa: <i> {{$aluno->n_casa}}</i></label>
                </div>
                <div class="form-group">
                    <label>Instagram: <i> {{$aluno->instagram}}</i></label>
                </div>
                <div class="form-group">
                    <label>Observação: <i> {{$aluno->observacao}}</i></label>
                </div>
                <div class="form-group">
                    <label>Dia de pagamento: <i> {{$aluno->dia_pagamento}}</i></label>
                </div>
                <div class="form-group">
                    @if (empty($aluno->turma['nome']))
                        <label>Turma: </label> <i> Sem Turma </i>                      
                    @else
                        <label>Turma: </label> <i> {{$aluno->turma['nome']}} </i>
                </div> 
                <div class="form-group">
                    <button class="btn btn-info" data-toggle="modal" data-target="#pagamentoModal">Pagamento</button>
                    <a href=" {{ route('historico.show', $aluno->id) }} " class="btn btn-success">Histórico</a>
                </div>     
                    @endif                   
            </div>            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pagamentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <i>Após acionar o botão confirmar, o pagamento será efetivado e não poderá ser desfeito.</i>
        <form action="{{route('historico.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="valor">Valor R$:</label>
                <input class="form-control" type="text" name="valor" id="valor_pg" value="{{ number_format((float)$aluno->turma['valor'], 2, '.', '') }}" autocomplete="off">
            </div>
            <div>
                <label for="n_parcelas">Número de parcelas</label>
                <input class="form-control" type="number" min="1" max="18" name="n_parcelas_pagas" id="n_parcelas" value="1">
            </div>
            <div class="form-group">
                 <input type="hidden" value=" {{$aluno->id}} " name="aluno_id">
            </div>
            <div class="modal-footer">
                <button type="Submit" class="btn btn-primary">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>                
            </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
@stop