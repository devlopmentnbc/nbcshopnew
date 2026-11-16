<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Old slugs of renamed / merged brands, categories, sub-categories and
     * products, so their old URLs 301 to the current page instead of 404.
     */
    public function up(): void
    {
        Schema::create('slug_redirects', function (Blueprint $table) {
            $table->id();
            // Kind of URL the old slug belonged to: brand | category | sub_category | product
            $table->string('type', 20);
            $table->string('old_slug');
            // What it now points to (usually the same kind, e.g. a merged sub-category -> category)
            $table->string('target_type', 20);
            $table->unsignedBigInteger('target_id');
            $table->timestamps();

            $table->unique(['type', 'old_slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slug_redirects');
    }
};
