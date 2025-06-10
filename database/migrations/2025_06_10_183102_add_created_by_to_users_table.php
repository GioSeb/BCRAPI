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
        Schema::table('users', function (Blueprint $table) {
            // This column will store the ID of the user who created this user.
            // It's nullable because the very first Master user might not have a creator.
            // onDelete('cascade') means if a creator admin is deleted,
            // the users they created WILL also be deleted.
            $table->foreignId('created_by')->nullable()->after('remember_token')
                  ->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // First drop the foreign key constraint, then the column
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
};
