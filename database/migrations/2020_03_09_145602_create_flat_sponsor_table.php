<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flat_sponsor', function (Blueprint $table) {
            $table->unsignedBigInteger("flat_id");
            $table->unsignedBigInteger("sponsor_id");
            // onDelete per cancellare collegamenti con tabelle rispettive
            $table->foreign("flat_id")->references("id")->on("flats")->onDelete("cascade");
            $table->foreign("sponsor_id")->references("id")->on("sponsors")->onDelete("cascade");
            $table->primary(['flat_id', 'sponsor_id']);
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
        Schema::dropIfExists('flat_sponsor');
    }
}
