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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('channel', ['email', 'whatsapp']);
            $table->text('message');
            $table->json('filters')->nullable(); // conditions ciblage (statut, date, etc.)
            $table->enum('status', ['draft', 'scheduled', 'sent'])->default('draft');
            $table->timestamp('scheduled_at')->nullable();
            $table->unsignedBigInteger('sent_count')->default(0);
            $table->unsignedBigInteger('open_count')->default(0); // utile si email
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
