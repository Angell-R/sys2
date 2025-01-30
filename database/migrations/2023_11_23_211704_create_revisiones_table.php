<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_de_Revision');
            $table->string('fecharev');
            $table->foreignId('id_ordens');
            $table->string('tecnicos');
            $table->string('tipoequip')->nullable();
            $table->string('marca')->nullable();
            $table->string('capacidad')->nullable();
            $table->string('voltajeplacaq')->nullable();
            $table->string('voltajeconsumoq')->nullable();
            $table->string('amperajeplaceq')->nullable();
            $table->string('amperajel1q')->nullable();
            $table->string('amperajel2q')->nullable();
            $table->string('amperajel3q')->nullable();
            $table->string('tempambientec')->nullable();
            $table->string('tiporefric')->nullable();
            $table->string('modelevaporc')->nullable();
            $table->string('serialevaporc')->nullable();
            $table->string('voltajeplacac')->nullable();
            $table->string('voltajeconsumoc')->nullable();
            $table->string('amperajeplacec')->nullable();
            $table->string('amperajel1c')->nullable();
            $table->string('amperajel2c')->nullable();
            $table->string('amperajel3c')->nullable();
            $table->string('psuccionq')->nullable();
            $table->string('pdescargaq')->nullable();
            $table->string('modelcondensaq')->nullable();
            $table->string('serialcondensaq')->nullable();
            $table->string('funciona')->nullable();
            $table->string('cargarefri')->nullable();
            $table->string('sepertinc')->nullable();
            $table->string('serpetine')->nullable();
            $table->string('filtro')->nullable();
            $table->string('ventiladorc')->nullable();
            $table->string('ventiladore')->nullable();
            $table->string('compresor')->nullable();
            $table->string('tuboescape')->nullable();
            $table->string('tuboaislado')->nullable();
            $table->string('tubosoporte')->nullable();
            $table->string('breakers')->nullable();
            $table->string('protector')->nullable();
            $table->string('cableadoe')->nullable();
            $table->string('lugartrabajo')->nullable();
            $table->string('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};
