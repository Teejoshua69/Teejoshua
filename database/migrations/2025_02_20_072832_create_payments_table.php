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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("payment_methods", 100);
            $table->enum("status", ["success", "failed", "expired"]);
            $table->text("description");
            $table->decimal("price_per_hour");
            $table->unsignedBigInteger("reservation_id");
            $table->foreign("reservation_id")->references("id")->on("reservations")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
