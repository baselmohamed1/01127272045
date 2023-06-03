<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Platform;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('platform_css_selectors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Platform::class);
            $table->string('css_selector');  
            $table->enum('media_type', ['movie', 'series']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platform_css_selectors');
    }
};
