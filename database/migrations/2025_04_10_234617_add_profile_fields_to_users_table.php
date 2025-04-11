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
        // Usamos Schema::table() para modificar una tabla existente
        Schema::table('users', function (Blueprint $table) {
            // Agregamos las nuevas columnas después de 'remember_token' (o donde prefieras)
            $table->string('actividad')->after('remember_token');
            $table->string('cargo')->after('actividad');
            $table->string('vinculo')->after('cargo');
            $table->string('domicilio')->after('vinculo');
            $table->string('localidad')->after('domicilio');
            // Usamos string para teléfono por si incluye +, -, etc.
            $table->string('telefono')->after('localidad');
            // Usamos string para CUIT para flexibilidad y evitar problemas con bigInteger/ceros/guiones
            $table->string('cuit')->unique()->after('telefono');
            // unique() asegura que no haya dos usuarios con el mismo CUIT (si aplica)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminamos las columnas en el orden inverso o todas juntas
            $table->dropColumn([
                'actividad',
                'cargo',
                'vinculo',
                'domicilio',
                'localidad',
                'telefono',
                'cuit'
            ]);
        });
    }
};
