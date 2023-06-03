<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Platform;
use App\Models\Server;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Platform::class);
            $table->foreignIdFor(Server::class);
            $table->string('content_name');
            $table->string('url');
            $table->string('folder_path')->nullable();
            $table->enum('media_type', ['movie', 'series']);
            $table->enum('process_status', ['new', 'processed', 'failed'])->default('new');
            $table->enum('download_status', ['new','started', 'completed', 'failed'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
