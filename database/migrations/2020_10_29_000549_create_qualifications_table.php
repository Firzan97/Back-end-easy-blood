<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("lastDonation");
            $table->desease("desease");
            $table->string("problem");
            $table->bool("beautyInjection");
            // $table->date("lastInjection");
            $table->string("familyHavingHepatitis");
            $table->bool("dengue");
            // $table->date("lastInfectedDengue");
            $table->bool("receiveVaccine");
            // $table->date("dateReceiveVaccine");
            $table->bool("misscariage");
            // $table->date("dateMisscariage");
            $table->bool("pierceCuppingAcupuntureTattoo");
            // $table->date("datepierceCuppingAcupuntureTattoo");
            $table->bool("takeAntiobiotic");
            // $table->date("dateTakeAntibiotic");
            $table->bool("CJD1");
            $table->bool("CJD2");
            $table->bool("CJD3");
            $table->bool("sexWithMan");
            $table->bool("sexWithProstitute");
            $table->bool("paidOrPaySex");
            $table->bool("sexPartnerNumber");
            $table->bool("sexPArnerLast12Month");
            $table->bool("injectDrug");
            $table->bool("partnerCatagories");
            $table->bool("partnerHIVpositive");
            $table->bool("youOrSexPartnerHIVinfected");
            $table->foreignId("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}
