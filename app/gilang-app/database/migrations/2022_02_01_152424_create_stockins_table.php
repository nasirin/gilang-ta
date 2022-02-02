<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangs_id')->constrained('barangs')->onDelete('cascade');
            $table->foreignId('distributors_id')->constrained('distributors')->onDelete('cascade');
            $table->bigInteger('qty_masuk');
            $table->bigInteger('harga_dist');
            $table->enum('status', ['checked', 'uncheck']);
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
        Schema::dropIfExists('stockins');
    }
}
