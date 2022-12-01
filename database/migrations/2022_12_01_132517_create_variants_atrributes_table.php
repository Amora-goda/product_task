<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants_atrributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id')->constrained('variants')->cascadeOnDelete();
            $table->foreignId('attribute_id')->constrained('attributes');
            $table->string('value');
            $table->primary(['variant_id','attribute_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variants_atrributes');
    }
};
