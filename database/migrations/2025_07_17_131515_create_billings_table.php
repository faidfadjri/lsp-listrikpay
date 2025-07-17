<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id('billing_id');

            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('usage_id')->constrained('usages')->onDelete('cascade');
            
            $table->string('month')->comment('Bulan Tagihan');
            $table->string('year')->comment('Tahun Tagihan');

            $table->decimal('amount_due', 10, 2)->comment('Jumlah Tagihan');
            $table->date('due_date')->comment('Tanggal Jatuh Tempo');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid')->comment('Status Pembayaran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
