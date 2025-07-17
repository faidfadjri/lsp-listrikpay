<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->foreignId('billing_id')->constrained('billings')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            
            $table->decimal('amount_fee', 10, 2)->comment('Biaya Administrasi');
            $table->decimal('amount_paid', 10, 2)->comment('Jumlah Pembayaran');

            $table->date('payment_date')->comment('Tanggal Pembayaran');
            $table->enum('payment_method', ['cash', 'bank_transfer', 'credit_card'])->default('cash')->comment('Metode Pembayaran');

            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->comment('ID Pengguna yang input data pembayaran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
