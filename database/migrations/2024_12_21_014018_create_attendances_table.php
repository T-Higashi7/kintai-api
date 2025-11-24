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
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->integer('year');
            $table->integer('month');
            $table->jsonb('attendance');
            $table->string('submitter');
            $table->string('status');
            //yearかつmonth,submitter,statusが重複しているレコードをinsertできないようにunique制約
            $table->unique(['year','month','submitter','status']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
