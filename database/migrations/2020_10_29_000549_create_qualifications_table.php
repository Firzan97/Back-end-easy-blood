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
            $table->string("beautyInjection");
            $table->string("familyHavingHepatitis");
            $table->string("dengue");
            $table->string("receiveVaccine");
            $table->string("misscariage");
            $table->string("pierceCuppingAcupuntureTattoo");
            $table->string("takeAntiobiotic");
            $table->string("surgical");
            $table->string("injury");
            $table->string("transfussion");
            $table->string("CJD1");
            $table->string("CJD2");
            $table->string("CJD3");
            $table->string("sexWithMan");
            $table->string("sexWithProstitute");
            $table->string("paidOrPaySex");
            $table->string("sexPartnerNumber");
            $table->string("sexPArnerLast12Month");
            $table->string("injectDrug");
            $table->string("partnerCatagories");
            $table->string("partnerHIVpositive");
            $table->string("youOrSexPartnerHIVinfected");
            $table->string("feelingWell");
            $table->string("testBlood");
            $table->string("dentalTreatment");
            $table->string("takenAlcohol");
            $table->string("menstruating");
            $table->string("pregnant");
            $table->string("breastfeed");
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
