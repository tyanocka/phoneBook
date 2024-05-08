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
        Schema::create('phonebooks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Имя абонента');
            $table->string('phone')->comment('Телефон абонента');
            $table->foreignId('user_id')->contrained();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phonebooks');
    }
};
