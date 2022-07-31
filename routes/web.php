<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlunoController,
    TurmaController,
    HistoricoController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AlunoController::class, 'create'])->name('aluno.create');
Route::get('/cadastro-aluno', [AlunoController::class, 'create'])->name('aluno.create');
Route::post('/salvar-aluno', [AlunoController::class, 'store'])->name('aluno.store');
Auth::routes();

Route::group(['middleware' => ['auth', 'mananger']], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/cadastro-turma', [TurmaController::class, 'create'])->name('turma.create');

    Route::post('/salva-turma', [TurmaController::class, 'store'])->name('turma.store');

    Route::get('/listar-turmas', [TurmaController::class, 'index'])->name('turma.index');

    

    Route::get('/listar-alunos', [AlunoController::class, 'index'])->name('aluno.index');

    Route::get('/aluno/{id}/edit', [AlunoController::class, 'edit'])->name('aluno.edit');

    Route::put('/aluno/{id}', [AlunoController::class, 'update'])->name('aluno.update');

    Route::get('/aluno-detalhe/{id}', [AlunoController::class, 'show'])->name('aluno.show');

    Route::get('/matricula/{id}', [TurmaController::class, 'matricula'])->name('turma.matricula');

    Route::put('/efetivar-matricula', [AlunoController::class, 'efetivar_matricula'])->name('efetivar-matricula.aluno');

    Route::get('/alunos-por-turma/{id}', [AlunoController::class, 'aluno_turma'])->name('aluno_turma.aluno');

    Route::get('/detalhes-turma/{id}', [TurmaController::class, 'detalhe_turma'])->name('detalhe.turma');

    Route::post('/salvar-historico', [HistoricoController::class, 'store'])->name('historico.store');

    Route::get('/historico-aluno/{id}', [HistoricoController::class, 'show'])->name('historico.show');

    Route::get('/saque', [HistoricoController::class, 'saque'])->name('historico.saque');

    Route::post('registra-saque', [HistoricoController::class, 'registra_saque'])->name('historico.registra_saque');

    Route::get('/historico-retidaras', [HistoricoController::class, 'retiradas'])->name('historico.retiradas');
    
    Route::get('/historico-entradas', [HistoricoController::class, 'entradas'])->name('historico.entradas');
});