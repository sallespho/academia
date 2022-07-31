@extends('template/template')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        @if(Auth::check())
            @section('content_header')
                <h1>Cadastro</h1>
            @stop
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Novo Aluno</h3>
            </div>
            <form method="post" action="{{route('aluno.store')}}">
                @csrf
                    @include('includes.validationform')
                    @include('_partials.form')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop