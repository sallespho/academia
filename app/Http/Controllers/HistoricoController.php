<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;
use App\Models\Saldo;
use App\Models\Aluno;
use App\Http\Requests\HistoricoRequest;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{
    public function __construct(Historico $historico, Saldo $saldo, Aluno $aluno)
    {
        $this->historico    = $historico;
        $this->saldo        = $saldo;
        $this->aluno        = $aluno;
    }

    public function store(HistoricoRequest $request)
    {
        DB::beginTransaction();
        $dados = $request->all();
        $dados['tipo'] = 'E';
        $dados['data'] = date('Y/m/d');
        $historico = $this->historico;
        $saldo = $this->saldo->latest()->first();
        if($saldo == null)
        {
            $saldo = $this->saldo->create(['quantidade' => $dados['valor']]);
        }
        else
        {
            $quantidade = $saldo->quantidade;
            $saldo_acrescentado = $quantidade + $dados['valor'];
            $saldo->update(['quantidade' => $saldo_acrescentado]);
        }
        
        $historico->create($dados);
        
        
        if ($historico && $saldo)
        {
            //Sucesso!
            DB::commit();
            $aluno = $dados['aluno_id'];
            return redirect()->route('aluno.index', compact('aluno'))->with('status', 'Pagamento realizado com sucesso!!!');
        } Else {
            //Fail, desfaz as alterações no banco de dados
            DB::rollBack();
        }
    }

    public function show($id)
    {
        $historicos = $this->historico->where('aluno_id', $id)->get();
        $aluno = $this->aluno->find($id);
        return view('historico-aluno', compact('historicos', 'aluno'));
    }

    public function saque()
    {
        return view('saque');
    }

    public function registra_saque(HistoricoRequest $request)
    {
        $dados = $request->all();
        $dados['tipo'] = 'S';
        $dados['data'] = date('Y/m/d');
        $saldo = $this->saldo->latest()->first();
        $historico = $this->historico;
        $quantidade = $saldo->quantidade;
        $saldo_final = $quantidade - $dados['valor'];        
        
        if($saldo_final < 0 )
        {
            $quantidade = number_format($quantidade, 2, '.', ' ');
            return redirect()->route('historico.saque')->withErrors(
                ['msg' => 
                'Não há fundos suficiente o saldo atual é: R$ ' . 
                $quantidade .
                ' E o valor do saque informado é de R$ ' . $dados['valor']]);
        }
        $saldo->update(['quantidade' => $saldo_final]);
        $historico->create($dados);
        if ($historico && $saldo )
        {
            //Sucesso!
            DB::commit();
            return redirect()->route('historico.saque')->with('status', 
            'Saque efeitivado, seu saldo atualmente é: ' .  $saldo_final);
        } Else {
            //Fail, desfaz as alterações no banco de dados
            DB::rollBack();
        }
    }

    public function retiradas()
    {
        $historicos = $this->historico->where('tipo', 'S')->get();
        return view('historico-retirada', compact('historicos'));
    }

    public function entradas()
    {
        $entradas = $this->historico->where('tipo', 'E')->get();
        return view('historico-entradas', compact('entradas'));
    }

}
