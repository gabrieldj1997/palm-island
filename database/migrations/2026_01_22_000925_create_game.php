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
        Schema::create('tb_games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('seed', 5);
            $table->integer('turn')->default(1);
            $table->integer('total_stars')->default(0);
            $table->timestamps();
            $table->index('user_id');
        });
        Schema::create('tb_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type', 20);
        });
        Schema::create('tb_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->constrained('tb_cards')->onDelete('cascade');
            $table->integer('section_number');
            $table->integer('stars')->default(0);
            $table->integer('improvements')->default(0);
            $table->integer('wood_resource')->default(0);
            $table->integer('fish_resource')->default(0);
            $table->integer('stone_resource')->default(0);
            $table->unique(['card_id', 'section_number']);
        });
        Schema::create('tb_section_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('tb_sections')->onDelete('cascade');
            $table->integer('type');
            $table->integer('wood_cost')->default(0);
            $table->integer('fish_cost')->default(0);
            $table->integer('stone_cost')->default(0);
        });
        Schema::create('tb_game_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('tb_games')->onDelete('cascade');
            $table->foreignId('card_id')->constrained('tb_cards')->onDelete('cascade');
            $table->integer('position');
            $table->integer('section_active')->default(0);
            $table->boolean('resource_available')->default(false);
            $table->index(['game_id', 'card_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_game_cards');
        Schema::dropIfExists('tb_section_actions');
        Schema::dropIfExists('tb_sections');
        Schema::dropIfExists('tb_cards');
        Schema::dropIfExists('tb_games');
    }
};
