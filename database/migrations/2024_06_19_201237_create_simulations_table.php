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
        Schema::create('simulations', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title');
            $table->text('description');
            $table->string('objective');
            $table->integer('duration');
            $table->string('complexityLevel');
            $table->integer('points');
            $table->boolean('available')->default(1);
            $table->timestamps(); // createdAt and updatedAt
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulations');
    }
};
