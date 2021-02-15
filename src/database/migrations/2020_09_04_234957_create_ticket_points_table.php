<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->string('point_name', 128);
            $table->text('message')->nullable();
            $table->text('proceed')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('ticket_id', 'ticket_point')
                ->references('id')
                ->on('tickets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_points');
    }
}
