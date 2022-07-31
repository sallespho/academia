@extends('template/template')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        @section('content_header')
            <h1>{{$aluno->nome}}</h1>
        @stop
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar</h3>
            </div>
            <form method="post" action="{{route('aluno.update', $aluno->id)}}">
                @method('PUT')  
                @csrf
                    @include('includes.validationform')
                    @include('_partials.form')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop