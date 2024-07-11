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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->date('submissionDate');
            $table->string('status');
            $table->string('type');
            $table->string('submitMessage');
            $table->date('resolutionDate')->nullable();
            $table->string('resolutionMessage')->nullable();
            $table->timestamps();


             // Defining the foreign key constraint
             $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamations');
    }
};
