<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();          
            $table->foreignId('turma_id')->nullable()->constrained('turmas');
            $table->foreignId('user_id')->nullable()->constrained('users');  
            $table->string('nome');
            $table->string('responsavel_financeiro')->nullable();
            $table->string('data_nascimento');
            $table->string('cpf');
            $table->string('altura')->nullable();
            $table->string('celular');
            $table->string('celular_responsavel')->nullable();
            $table->string('celular_financeiro')->nullable();
            $table->string('cpf_responsavel')->nullable();
            $table->string('bairro');
            $table->string('rua');
            $table->string('n_casa');
            $table->string('instagram')->nullable();
            $table->string('observacao')->nullable();
            $table->string('cuidado_especial')->nullable();
            $table->string('dia_pagamento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
