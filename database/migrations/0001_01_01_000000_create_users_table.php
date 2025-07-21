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
        // Table des utilisateurs (admin, entrepreneur)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');        
            $table->string('nom_responsable');       
            $table->string('email')->unique();       
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone');             
            $table->string('role')->default('entrepreneur_en_attente'); 
            $table->string('statut')->default('en_attente'); 
            $table->string('password');            
            $table->rememberToken();
            $table->timestamps();
        });

        // Table de réinitialisation des mots de passe
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Table de gestion des sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
