<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("assigned");
            $table->integer("target_quantity")->default(0);
            $table->integer("current_quantity")->default(0);
            $table->integer("progress")->default(0);
            $table->dateTime("deadline")->default(Carbon::now()->addDays(rand(3, 10))->format('Y-m-d'));
            $table->text("description")->default("Mohon dikerjakan sesuai target dan selesaikan sebelum deadline");
            $table->unsignedBigInteger("task_status_id")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
