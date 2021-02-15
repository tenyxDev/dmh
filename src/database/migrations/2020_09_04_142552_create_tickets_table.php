<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ticket_type')->index();
            $table->tinyInteger('status')->default(0); // 0 - new, 1 - active, 2 - pending, 3 - completed, 4 - failed
            $table->string('ticket_name', 128);
            $table->unsignedInteger('timer');
            $table->text('description')->nullable();
            $table->unsignedInteger('changed_by');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });

        Schema::table('tickets', function ($table) {
            $table->foreign('user_id', 'user_tickets')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('tickets');
    }
}
