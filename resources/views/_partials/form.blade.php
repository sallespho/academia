<div class="card-body">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$aluno['nome'] ?? old('nome')}}" >
    </div>
    <div class="form-group">
        <label for="nome">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="nome@provedor.com" value="{{old('email')}}" >
    </div>
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="{{$aluno['cpf'] ?? old('cpf')}}" >
    </div>
        <div class="form-group">
        <label for="resposanvel_financeiro">Responsavel Financeiro</label>
        <input type="text" class="form-control" id="resposanvel_financeiro" name="resposanvel_financeiro" placeholder="responsavel financeiro" value="{{$aluno['resposanvel_financeiro'] ?? old('resposanvel_financeiro')}}">
    </div>
        <div class="form-group">
        <label for="data_nascimento">Data de Nascimento</label>
        <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000" value="{{$aluno['data_nascimento'] ?? old('data_nascimento')}}">
    </div>
    <div class="form-group">
        <label for="altura">Altura</label>
        <input type="text" class="form-control" id="altura" name="altura" placeholder="altura" value="{{$aluno['altura'] ?? old('altura')}}">
    </div>
    <div class="form-group">
        <label for="celular">celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="(00)00000-00000" value="{{$aluno['celular'] ?? old('celular')}}">
    </div>
    <div class="form-group">
        <label for="celular_responsavel">Celular responsavel</label>
        <input type="text" class="form-control" id="celular_responsavel" name="celular_responsavel" placeholder="celular responsavel" value="{{$aluno['celular_responsavel'] ?? old('celular_responsavel')}}">
    </div>
    <div class="form-group">
        <label for="rua">Rua</label>
        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="{{$aluno['rua'] ?? old('rua')}}">
    </div>
    <div class="form-group">
        <label for="bairro">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{$aluno['bairro'] ?? old('bairro')}}">
    </div>
    <div class="form-group">
        <label for="n_casa">Número da Casa</label>
        <input type="text" class="form-control" id="n_casa" name="n_casa" placeholder="Número da Casa" value="{{$aluno['n_casa'] ?? old('n_casa')}}">
    </div>
        <div class="form-group">
        <label for="dia_pagamento">Melhor dia de pagamento</label>
        <input type="number" min="1" max="30" class="form-control" id="dia_pagamento" name="dia_pagamento" value="{{$aluno['dia_pagamento'] ?? old('dia_pagamento')}}">
    </div>
    <div class="form-group">
        <label for="n_casa">Instagram</label>
        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="{{$aluno['instagram'] ?? old('instagram')}}">
    </div>
    <div class="form-group">
        <label for="observacao">Observação</label>
        <textarea class="form-control" name="observacao"
            rows="3" placeholder="Descreva, caso haja, um cuidado especial em relação ao aluno..." style="height: 89px;" value="{{$aluno['observacao'] ?? old('observacao')}}"></textarea>
    </div>
</div>
