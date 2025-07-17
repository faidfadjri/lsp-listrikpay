<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('username')->unique();
            $table->string('password');

            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('address');
            
            $table->foreignId('tarif_id')->constrained('tarifs')->onDelete('cascade');
            $table->string('meter_number')->comment('Nomor Meteran');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
