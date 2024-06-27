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

        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('passageexamid');
            $table->date('requestDate');
            $table->string('status');
            $table->string('type'); //type1 or type2
            $table->date('responseDate');
            $table->string('responseMessage');
            $table->timestamps();


            // Defining the foreign key constraint
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('passageexamid')->references('id')->on('passageexams')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
