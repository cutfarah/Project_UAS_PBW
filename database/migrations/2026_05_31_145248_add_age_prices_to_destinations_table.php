<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->decimal('adult_price', 12, 2)
                ->nullable()
                ->after('price');

            $table->decimal('child_price', 12, 2)
                ->nullable()
                ->after('adult_price');
        });

        DB::table('destinations')->update([
            'adult_price' => DB::raw('price'),
            'child_price' => DB::raw('ROUND(price * 0.75, 0)'),
        ]);
    }

    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn(['adult_price', 'child_price']);
        });
    }
};