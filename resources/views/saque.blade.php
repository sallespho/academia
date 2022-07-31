@extends('template/template')
@section('content')
    <div class="card card-primary">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header">
            <h3 class="card-title">Saque</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('historico.registra_saque')}}">
                @csrf
                    @include('includes.validationform')
                    <div class="form-group col-4">
                        <label for="valor">Valor</label>
                        <input type="text" name="valor" id="valor" class="form-control" autocomplete="off" placeholder="Valor R$">
                    </div>
                    <div class="form-group col-4">
                        <label for="descricao">Descrição</label>
                        <textarea  class="form-control" name="descricao" placeholder="Descreva a retirada"></textarea>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Sacar</button>
                </div>                
            </form>
        </div>
    </div>
@endsection