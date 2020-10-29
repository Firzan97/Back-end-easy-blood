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
            $table->string("desease");
            $table->string("problem");
            $table->bool("beautyInjection");
            $table->string("familyHavingHepatitis");
            $table->bool("dengue");
            $table->bool("receiveVaccine");
            $table->bool("misscariage");
            $table->bool("pierceCuppingAcupuntureTattoo");
            $table->bool("takeAntiobiotic");
            $table->bool("surgical");
            $table->bool("injury");
            $table->bool("transfussion");
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
            $table->bool("feelingWell");
            $table->bool("testBlood");
            $table->bool("dentalTreatment");
            $table->bool("takenAlcohol");
            $table->bool("menstruating");
            $table->bool("pregnant");
            $table->bool("breastfeed");
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
