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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mesas')->unsigned();
            $table->foreign('id_mesas')->references('id')->on('mesas')->onDelete('cascade');
            
            $table->bigInteger('id_platos')->unsigned();
            $table->foreign('id_platos')->references('id')->on('platos')->onDelete('cascade');
            
            // $table->bigInteger('id_usuarios')->unsigned();
            // $table->foreign('id_usuarios')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('comentario', 250)->default('');
            $table->integer('cantidad')->default(0);
            $table->string('estado', 100)->default(''); //0 = ordenado, 1 = preparacion, 2 = entregado, 3 = pagado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
