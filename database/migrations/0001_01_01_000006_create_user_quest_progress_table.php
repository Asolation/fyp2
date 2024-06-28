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
        Schema::create('user_quest_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quest_id')->constrained()->onDelete('cascade');
            $table->boolean('completed')->default(false);
            $table->integer('progress')->default(0); // For example, percentage or steps completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quest_progress');
    }
};
