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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('location');
            $table->string('page_url');
            $table->string('hero_title');
            $table->string('hero_sub_title');
            $table->string('section_1_title_1');
            $table->longText('section_1_content_1');
            $table->string('section_1_title_2');
            $table->longText('section_1_content_2');
            $table->longText('conference_pricing_text');
            $table->longText('sponsor_section_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
