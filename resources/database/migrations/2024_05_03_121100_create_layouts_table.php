<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Schema;
use Vedian\Grapebuilder\Support\Enum\TemplateEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', TemplateEnum::toArray())->index();
            $table->boolean('is_active');
            $table->json('content');
            $table->foreignIdFor(User::class, 'created_by')->constrained('users');
            $table->foreignIdFor(User::class, 'updated_by')->constrained('users');
            $table->timestamps();
            // $table->unique(['type', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layouts');
    }
};
