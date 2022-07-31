@extends('template/template')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        @section('content_header')
            <h1>Cadastro</h1>
        @stop
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nova Turma</h3>
            </div>
          
            <form method="post" action="{{route('turma.store')}}">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                
                        @foreach($errors->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{old('nome')}}">
                    </div>
                     <div class="form-group">
                        <label for="modalidade">Modalidade</label>
                        <input type="text" class="form-control" id="modalidade" name="modalidade" placeholder="modalidade" value="{{old('modalidade')}}">
                    </div>
                    <div class="row">
                        <legend>Dias de Aula</legend>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="segunda" name="dias_aula[]" value="segunda" value="segunda">
                                <label class="form-check-label" for="segunda">Segunda Feira</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terca" name="dias_aula[]" value="terca" value="terca">
                                <label class="form-check-label" for="terca">Terça Feira</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="quarta" name="dias_aula[]" value="quarta" value="quarta">
                                <label class="form-check-label" for="quarta">Quarta Feira</label>
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="quinta" name="dias_aula[]" value="quinta" value="quinta">
                                <label class="form-check-label" for="quinta">Quinta Feira</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sexta" name="dias_aula[]" value="sexta" value="sexta">
                                <label class="form-check-label" for="sexta">Sexta Feira</label>
                            </div> 
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sabado" name="dias_aula[]" value="sabado" value="sabado">
                                <label class="form-check-label" for="sabado">Sabado</label>
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="horario">horario</label>
                        <input type="text" class="form-control" id="horario" name="horario" placeholder="horario" value="{{old('horario')}}">
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor R$</label>
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="valor" value="{{old('valor')}}">
                    </div>
                    <div class="form-group">                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#professor">
                            Selecione o Professor
                        </button>
                    </div>
                    <div class="form-group">
                        <input type="text" id="nome_prof" placeholder="Professor" disabled>
                        <input type="hidden" id="user_id" name="user_id" value="{{ old('user_id') }}" >
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="professor" tabindex="-1" role="dialog" aria-labelledby="professorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="professorLabel">Selecione o professor responsável pela turma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name}}</td>
                <td>{{ $usuario->id}}</td>
            </tr>
            @endforeach                
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@stop