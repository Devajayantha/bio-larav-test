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
        Schema::create('advice_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advice_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('locale', 10)->index();
            $table->text('name')->nullable();
            $table->text('information')->nullable();
            $table->text('actual_tip')->nullable();
            $table->text('tip_example')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advice_translations');
    }
};
