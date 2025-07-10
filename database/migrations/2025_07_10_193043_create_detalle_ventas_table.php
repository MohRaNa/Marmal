<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('venta_id') 
                  ->constrained('ventas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('inventario_id') 
                  ->constrained('inventarios')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->integer('cantidad');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
};