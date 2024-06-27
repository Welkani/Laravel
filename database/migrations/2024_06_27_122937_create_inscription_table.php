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
        
        Schema::create('eleve', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom',70);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
        
        });
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('professeur');
            
            
        });
        Schema::create('inscription', function (Blueprint $table) {
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->foreignId('cours_id')->constrained('cours')->onDelete('cascade');
            $table->foreignId('eleve_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription');
    }
};
