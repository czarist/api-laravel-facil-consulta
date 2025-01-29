<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('especialidade');
            $table->unsignedBigInteger('cidade_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
