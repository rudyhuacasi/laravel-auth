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
        Schema::table('projects', function (Blueprint $table) {
            // crea il campo
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            // crea la chiave esterna
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->nullOnDelete();

            // modalità abreviata 
            // $table->foreignId('category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //droppiamo la relazione tra le tabelle
            $table->dropForeign('projects_category_id_foreign');
            //droppiamo il campo
            $table->dropColumn('category_id');
        });
    }
};
