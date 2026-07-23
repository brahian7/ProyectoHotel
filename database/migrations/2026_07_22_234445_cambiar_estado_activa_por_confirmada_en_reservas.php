<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |------------------------------------------------------------
        | Agregar temporalmente Confirmada al ENUM
        |------------------------------------------------------------
        */

        DB::statement("
            ALTER TABLE reservas
            MODIFY estado ENUM(
                'Pendiente',
                'Activa',
                'Confirmada',
                'Finalizada',
                'Cancelada'
            ) NOT NULL
        ");

        /*
        |------------------------------------------------------------
        | Cambiar los registros existentes
        |------------------------------------------------------------
        */

        DB::statement("
            UPDATE reservas
            SET estado='Confirmada'
            WHERE estado='Activa'
        ");

        /*
        |------------------------------------------------------------
        | Eliminar Activa del ENUM
        |------------------------------------------------------------
        */

        DB::statement("
            ALTER TABLE reservas
            MODIFY estado ENUM(
                'Pendiente',
                'Confirmada',
                'Finalizada',
                'Cancelada'
            ) NOT NULL
        ");
    }

    public function down(): void
    {
        /*
        |------------------------------------------------------------
        | Volver a agregar Activa
        |------------------------------------------------------------
        */

        DB::statement("
            ALTER TABLE reservas
            MODIFY estado ENUM(
                'Pendiente',
                'Activa',
                'Confirmada',
                'Finalizada',
                'Cancelada'
            ) NOT NULL
        ");

        /*
        |------------------------------------------------------------
        | Restaurar datos
        |------------------------------------------------------------
        */

        DB::statement("
            UPDATE reservas
            SET estado='Activa'
            WHERE estado='Confirmada'
        ");

        /*
        |------------------------------------------------------------
        | Dejar el ENUM como estaba
        |------------------------------------------------------------
        */

        DB::statement("
            ALTER TABLE reservas
            MODIFY estado ENUM(
                'Pendiente',
                'Activa',
                'Finalizada',
                'Cancelada'
            ) NOT NULL
        ");
    }
};