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
        Schema::create('uniproms', function (Blueprint $table) {
            $table->string('barcodelist')->nullable();
            $table->string('barcode')->nullable();
            $table->string('barcode2')->nullable();
            $table->string('barcode3')->nullable();
            $table->string('code')->nullable();
            $table->string('coeff2')->nullable();
            $table->string('coeff3')->nullable();
            $table->string('del')->nullable();
            $table->string('desc')->nullable();
            $table->string('dopprop1')->nullable();
            $table->string('dopprop2')->nullable();
            $table->string('dopprop3')->nullable();
            $table->string('dopprop4')->nullable();
            $table->string('dopprop5')->nullable();
            $table->string('group')->nullable();
            $table->string('guid')->nullable();
            $table->string('lid')->nullable();
            $table->string('lost')->nullable();
            $table->string('min')->nullable();
            $table->string('name')->nullable();
            $table->string('namefull')->nullable();
            $table->string('nom')->nullable();
            $table->string('outw')->nullable();
            $table->string('p1')->nullable();
            $table->string('p10')->nullable();
            $table->string('p2')->nullable();
            $table->string('p3')->nullable();
            $table->string('p4')->nullable(); 
            $table->string('p5')->nullable();
            $table->string('p6')->nullable();
            $table->string('p7')->nullable();
            $table->string('p8')->nullable();
            $table->string('p9')->nullable();
            $table->string('pin')->nullable();
            $table->string('piece')->nullable();
            $table->string('plu')->nullable(); 
            $table->string('qtty')->nullable();
            $table->string('scs')->nullable();
            $table->string('tare')->nullable();
            $table->string('type')->nullable();
            $table->string('uktzed')->nullable();
            $table->string('unit1')->nullable();
            $table->string('unit2')->nullable();
            $table->string('unit3')->nullable();
            $table->string('vat')->nullable();
            $table->string('vendor')->nullable();
            $table->string('visible')->nullable();

            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uniproms');
    }
};
