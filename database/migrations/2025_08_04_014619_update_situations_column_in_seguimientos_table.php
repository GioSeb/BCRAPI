<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This is a destructive migration as it removes the old column.
     * Ensure you have no critical data in 'last_known_situation' before running.
     */
    public function up(): void
    {
        Schema::table('seguimientos', function (Blueprint $table) {
            // Add the new JSON column to store multiple situations.
            $table->json('situations')->nullable()->after('denominacion');

            // Drop the old column as it's now replaced.
            if (Schema::hasColumn('seguimientos', 'last_known_situation')) {
                $table->dropColumn('last_known_situation');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seguimientos', function (Blueprint $table) {
            // Re-add the old integer column if we need to roll back.
            $table->integer('last_known_situation')->nullable()->after('denominacion');

            // Drop the new JSON column.
            if (Schema::hasColumn('seguimientos', 'situations')) {
                $table->dropColumn('situations');
            }
        });
    }
};

