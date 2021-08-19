<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('quantity');
            $table->foreignId('contract_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('quality_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cocoa_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('unit_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
