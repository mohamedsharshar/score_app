<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::create('credit_reports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // factors
        $table->integer('on_time_payments')->comment('0–100');
        $table->integer('utilization_rate')->comment('0–100');
        $table->integer('account_age')->comment('months');
        $table->integer('credit_mix')->comment('0–100');
        $table->integer('new_inquiries')->comment('count');
        // computed score
        $table->integer('score');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_reports');
    }
};
