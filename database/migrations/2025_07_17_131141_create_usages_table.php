<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usages', function (Blueprint $table) {
            $table->id('usage_id');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');

            $table->string('month')->comment('Bulan Penggunaan');
            $table->string('year')->comment('Tahun Penggunaan');
            $table->decimal('start_meter', 10, 2)->comment('Meter Awal');
            $table->decimal('end_meter', 10, 2)->nullable()->comment('Meter Akhir');
            $table->decimal('usage', 10, 2)->comment('Penggunaan kWh');

            $table->timestamps();
        });
    }
   
    public function down(): void
    {
        Schema::dropIfExists('usages');
    }
};
