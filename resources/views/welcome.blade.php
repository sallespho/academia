@extends('template/template')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        @section('content_header')
            <h1>Cadastro</h1>
        @stop
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Novo Aluno</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" >
                    </div>
                     <div class="form-group">
                        <label for="resposanvel_financeiro">Responsavel Financeiro</label>
                        <input type="text" class="form-control" id="resposanvel_financeiro" name="resposanvel_financeiro" placeholder="responsavel financeiro">
                    </div>
                     <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000">
                    </div>
                    <div class="form-group">
                        <label for="altura">Altura</label>
                        <input type="text" class="form-control" id="altura" name="altura" placeholder="altura">
                    </div>
                    <div class="form-group">
                        <label for="celular">celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="(xx)00000-00000">
                    </div>
                    <div class="form-group">
                        <label for="celular_responsavel">Celular responsavel</label>
                        <input type="text" class="form-control" id="celular_responsavel" name="celular_responsavel" placeholder="celular responsavel">
                    </div>
                    <div class="form-group">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua">
                    </div>
                    <div class="form-group">
                        <label for="bairo">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                    </div>
                    <div class="form-group">
                        <label for="n_casa">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                    </div>
                    <div class="form-group">
                        <label for="observacao">Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Descreva, caso haja, um cuidado especial em relação ao aluno..." style="height: 89px;"></textarea>
                    </div>
                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop