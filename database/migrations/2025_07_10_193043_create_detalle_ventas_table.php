<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id(); // ID detalle (PK)
            $table->foreignId('venta_id') // Pertenece a venta (FK)
                  ->constrained('ventas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('inventario_id') // Producto vendido (FK)
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