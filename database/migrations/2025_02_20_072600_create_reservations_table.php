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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date("event_date");
            $table->time("start_time");
            $table->time("end_time");
            $table->text("event_address");
            $table->string("contact_number", 11);
            $table->enum("status", ["pending", "confrimed", "cancelled"]);
            $table->enum("payments_status", ["unpaid", "paid"]);
            $table->string("payment_link", 255);
            $table->decimal("total_amount");
            $table->unsignedBigInteger("admin_id");
            $table->unsignedBigInteger("customer_id");
            $table->foreign("admin_id")->references("id")->on("admin")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("customer_id")->references("id")->on("user_profile")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
