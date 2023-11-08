<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companyables', function (Blueprint $table) {
            $table->uuid('company_id');
            $table->uuid('companyable_id');
            $table->string('companyable_type');

            $table->index('companyable_id');
            $table->index('companyable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companyables');
    }
};
