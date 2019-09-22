<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 50);
            $table->string('cpf', 14)->unique();           // XXX.XXX.XXX-XX
            $table->date('data_de_nascimento');  // 0000-00-00
            $table->string('email', 50)->unique();
            $table->string('celular', 15);       // (00) 00000-0000
            $table->string('endereco', 50);
            $table->integer('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->char('uf', 2);               // XX
            $table->boolean('status');           // 1 - Ativo, 2 - Inativo

            $table->unsignedBigInteger('id_curso');

            $table->foreign('id_curso')->references('id')->on('cursos');

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
}
