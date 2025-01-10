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
        Schema::create('detailProjek', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_flyer');
            $table->string('title_1');
            $table->string('title_2');
            $table->text('desk_1'); 
            $table->string('gambar_1');
            $table->text('desk_2'); 
            $table->text('desk_3');
            $table->string('link_projek');

            $table->string('gambarIcon_1')->nullable();
            $table->string('gambarIcon_2')->nullable();
            $table->string('gambarIcon_3')->nullable();
            $table->string('gambarIcon_4')->nullable();
            $table->string('gambarIcon_5')->nullable();
            $table->string('gambarIcon_6')->nullable();
            $table->string('gambarIcon_7')->nullable();
            $table->string('gambarIcon_8')->nullable();
            $table->string('gambarIcon_9')->nullable();

            $table->string('gambarProjek_1')->nullable();
            $table->string('gambarProjek_2')->nullable();
            $table->string('gambarProjek_3')->nullable();
            $table->string('gambarProjek_4')->nullable();
            $table->string('gambarProjek_5')->nullable();
            $table->string('gambarProjek_6')->nullable();
            $table->string('gambarProjek_7')->nullable();
            $table->string('gambarProjek_8')->nullable();
            $table->string('gambarProjek_9')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
