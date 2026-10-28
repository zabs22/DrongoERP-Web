<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fields from the DrongoERP subscription form that had no column yet.
     */
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('contactPhone')->nullable()->after('phoneNum');
            $table->string('otherRequestType')->nullable()->after('existingSystem');
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn(['contactPhone', 'otherRequestType']);
        });
    }
};
