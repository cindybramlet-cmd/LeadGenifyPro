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
        // MySQL won't drop a unique index that a foreign key constraint depends on.
        // Drop the FK first, swap the unique index, then re-add the FK.
        Schema::table('smtp_server_usages', function (Blueprint $table) {
            $table->dropForeign(['smtp_server_id']);
            $table->dropUnique('smtp_server_usages_unique_server_date');
            $table->unique(
                ['smtp_server_id', 'account_id', 'usage_date'],
                'smtp_server_usages_unique_server_account_date'
            );
            $table->foreign('smtp_server_id')->references('id')->on('smtp_servers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('smtp_server_usages', function (Blueprint $table) {
            $table->dropForeign(['smtp_server_id']);
            $table->dropUnique('smtp_server_usages_unique_server_account_date');
            $table->unique(['smtp_server_id', 'usage_date'], 'smtp_server_usages_unique_server_date');
            $table->foreign('smtp_server_id')->references('id')->on('smtp_servers')->cascadeOnDelete();
        });
    }
};
