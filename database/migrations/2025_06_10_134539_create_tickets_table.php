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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('tracking_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->enum('ticket_type', [
                'Technical Issues',
                'Account & Billing',
                'Product & Service',
                'General Inquiry',
                'Feedback & Suggestions',
            ]);
            $table->text('message');
            $table->text('note')->nullable();
            $table->enum('status', ['Open', 'Noted'])->default('Open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
