<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reported_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('incident_type');
            $table->text('description');
            $table->string('location')->nullable();
            $table->timestamp('incident_date')->nullable();
            $table->enum('status', ['pending', 'investigating', 'resolved', 'closed'])->default('pending');
            $table->boolean('is_anonymous')->default(false);
            $table->text('admin_notes')->nullable();
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
        Schema::dropIfExists('incidents');
    }
}
