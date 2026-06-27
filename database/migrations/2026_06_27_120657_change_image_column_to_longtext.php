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
        Schema::table('articles', function (Blueprint $table) {
            $table->longText('image')->nullable()->change();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->longText('image')->nullable()->change();
        });
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->longText('image')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
};
