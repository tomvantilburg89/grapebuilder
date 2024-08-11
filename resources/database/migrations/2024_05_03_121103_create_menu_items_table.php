<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Vedian\Grapebuilder\Models\Menu;
use Vedian\Grapebuilder\Models\Page;
use Vedian\Grapebuilder\Support\LayoutPartEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->foreignIdFor(Page::class)->constrained();
            $table->foreignIdFor(Menu::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
