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
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('governmentId');
            $table->string('email');
            $table->decimal('debtAmount', 12, 2);
            $table->date('debtDueDate');
            $table->integer('debtId');
            $table->datetime('paid_at')->nullable();
            $table->decimal('paid_amount', 12, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing');
    }
};
