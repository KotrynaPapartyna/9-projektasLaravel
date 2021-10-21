<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("description");
            $table->string("logo", 400);

            $table->unsignedBigInteger("type_id");

            // SUJUNGIMO EILUTE (kas (foreign- kuri jungiasi- jos stulpelis),
            //per ka (reference- id), su kuo(in- lenteles pavadinimas))
                    //type_id (company)          susijes per id     is  lenteles (types)
            $table->foreign("type_id")->references("id")->on("types");

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
        Schema::dropIfExists('companies');
    }
}
