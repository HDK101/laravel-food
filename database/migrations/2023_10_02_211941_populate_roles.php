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
        DB::transaction(function() {
            DB::table('roles')->insert(
                [
                    'name' => 'Cliente',
                    'can_order' => true,
                    'can_manage_orders' => false,
                    'can_manage_foods' => false,
                    'created_at' => (new DateTime())->format(DateTime::ATOM)
                ]
            );
    
            DB::table('roles')->insert(
                [
                    'name' => 'Administrador',
                    'can_order' => true,
                    'can_manage_orders' => true,
                    'can_manage_foods' => true,
                    'created_at' => (new DateTime())->format(DateTime::ATOM)
                ]
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::transaction(function() {
            DB::table('roles')->where('name', '=', 'Cliente')->delete();
            DB::table('roles')->where('name', '=', 'Administrador')->delete();
        });
    }
};
