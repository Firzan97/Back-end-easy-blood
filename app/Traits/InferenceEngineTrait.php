<?php

namespace App\Traits;

use App\Qualification;
use App\Student;
use App\User;
use DateTime;

trait InferenceEngineTrait
{
    public function knowledgeBase($request, $qualification, $bloodType, &$knownfact, &$generatedFact)
    {
        $kf1 = $request->age;
        $kf2 = $request->gender;
        //calculate total day start from the date o flatest donation until today
        if ($qualification->lastDonation != null) {
            $datenow = date("Y-m-d h:i:s.u");
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i.u', $datenow);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i.u', $qualification->lastDonation);
            $lastDonationDuration = $to->diffInDays($from);
        } else {
            $lastDonationDuration = "never";
        }



        ////
        $kf3 =  $lastDonationDuration;
        $kf4 = $request->bloodType;
        $kf5 = $qualification->desease;
        $kf6 = $request->weight;
        $kf7 = $qualification->sexWithMan;
        $kf8 = $qualification->sexWithProstitute;
        $kf9 = $qualification->paidOrPaySex;
        $kf10 = $qualification->sexPartnerNumber;
        $kf11 = $qualification->sexPArnerLast12Month;
        $kf12 = $qualification->injectDrug;
        $kf13 = $qualification->partnerCatagories;
        $kf14 = $qualification->partnerHIVpositive;
        $kf15 = $qualification->youOrSexPartnerHIVinfected;
        $kf16 =  $qualification->CJD1;
        $kf17 =  $qualification->CJD2;
        $kf18 =  $qualification->CJD3;
        $kf19 =  $qualification->surgical;
        $kf20 =  $qualification->injury;
        $kf21 =  $qualification->transfussion;
        $kf22 =  $qualification->pierceCuppingAcupuntureTattoo;
        $kf23 =  $qualification->dengue;
        $kf24 =  $qualification->beautyInjection;
        $kf25 =  $qualification->misscariage;
        $kf26 =  $qualification->breastfeed;
        $kf27 =  $qualification->pregnant;

        $gf1 = "";
        $gf2 = "";
        $gf3 = "";
        $gf4 = "";
        $gf5 = "";
        $gf6 = "";
        $gf7 = "";
        $gf8 = "";
        $gf9 = "";

        $knownfact[$kf1] = "false";
        $knownfact[$kf2] = "false";
        $knownfact[$kf3] = "false";
        $knownfact[$kf4] = "false";
        $knownfact[$kf5] = "false";
        $knownfact[$kf6] = "false";
        $knownfact[$kf7] = "false";
        $knownfact[$kf8] = "false";
        $knownfact[$kf9] = "false";
        $knownfact[$kf10] = "false";
        $knownfact[$kf11] = "false";
        $knownfact[$kf12] = "false";
        $knownfact[$kf13] = "false";
        $knownfact[$kf14] = "false";
        $knownfact[$kf15] = "false";
        $knownfact[$kf16] = "false";
        $knownfact[$kf17] = "false";
        $knownfact[$kf18] = "false";
        $knownfact[$kf19] = "false";
        $knownfact[$kf20] = "false";
        $knownfact[$kf21] = "false";
        $knownfact[$kf22] = "false";
        $knownfact[$kf23] = "false";
        $knownfact[$kf24] = "false";
        $knownfact[$kf25] = "false";
        $knownfact[$kf26] = "false";
        $knownfact[$kf27] = "false";



        //Rule1
        if ($kf1 > 18) {
            $gf1 = "suitable age";
            $generatedFact[$gf1] = "false";
        }
        //Rule2
        if ($kf2 == "Male") {
            $gf2 = "your gender is male";
            $generatedFact[$gf2] = "false";
        } else {
            $gf2 = "your gender is female";
            $generatedFact[$gf2] = "false";
        }
        //Rule3
        if ($kf3 > 90 || $kf3 == "never") {
            $gf3 = "blood already replenish";
            $generatedFact[$gf3] = "false";
        }
        //Rule4
        if ($kf4 == $bloodType) {
            $gf4 = "blood is identical with requestor";
            $generatedFact[$gf4] = "false";
        }
        //Rule5
        if ($kf5 == "Dont have all these desease") {
            $gf5 = "You have no chronic desease";
            $generatedFact[$gf5] = "false";
        }
        //Rule6
        if ($kf6 > 45 && $kf6 < 150) {
            $gf6 = "weight is good";
            $generatedFact[$gf6] = "false";
        }

        //Rule7
        if ($kf7 == "never have sex with man" && $kf8 == "never have sex with prostitute" && $kf9 == "never have paid or pay sex") {
            if ($kf10 == "have no sex partner" && $kf11 == "have no sex partner last 12 month"  && $kf12 == "have no injectewd drug") {
                if ($kf13 == "not fall above categories"  && $kf14 == "have tested not positive HIV" && $kf15 == "not infected HIV") {
                    $gf7 = "you are clean";
                    $generatedFact[$gf7] = "false";
                }
            }
        }
        //Rule8
        if ($kf16 == "have no experience CJD1" && $kf17 == "have no experience CJD2" && $kf18 == "have no experience CJD3") {
            $gf8 = "you are vCJD free";
            $generatedFact[$gf8] = "false";
        }

        //Rule9
        if ($kf19 == "have no surgical" && $kf20 == "have no injury" && $kf21 == "have no blood transfussion" && $kf22 == "have not piercedCuppingAcupuntureTattoo" && $kf23 == "have no dengue"  && $kf24 == "nobeauty injection") {
            $gf10 = "your six month before is clean";
            $generatedFact[$gf10] = "false";
        }
        //Rule10
        if ($gf2 == "your gender is male") {
            $gf11 = "male can donate";
            $generatedFact[$gf11] = "false";
        } else {
            if ($kf25 == "have no misscariage") {
                if ($kf27 == "not pregnant") {
                    if ($kf26  == "not breastfeeding") {
                        $gf11 = "female can donate";
                        $generatedFact[$gf11] = "false";
                    }
                }
            }
        }
        //Rule11
        if ($gf1 == "suitable age"  &&  $gf4 == "blood is identical with requestor" &&  $gf6 == "weight is good" && $gf5 == "You have no chronic desease" && $gf3 == "blood already replenish" && ($gf11 = "male can donate" || $gf11 = "female can donate")) {
            $gf9 = "basic requirement passed";
            $generatedFact[$gf9] = "false";
        }

        //Rule12
        if ($gf9 = "basic requirement passed"  &&  $gf10 = "your six month before is clean" &&   $gf8 = "you are vCJD free" &&  $gf7 = "you are clean") {
            $gf12 = "You are eligible to donate";
            $generatedFact[$gf12] = "false";
        }
    }
    public function workingMemory($bloodRequested, &$knownfact, &$generatedFact)
    {
        foreach ($knownfact as $key => &$value) {

            //rule1
            if ($key > 18) {
                $value = "true";
            }
            //Rule2
            if (array_key_exists("Male", $knownfact) || array_key_exists("Female", $knownfact)) {
                if ($key == "Male") {
                    $value = "true";
                } else {
                    $value = "true";
                }
            }
            //Rule3
            if ($key > 90) {
                $value = "true";
            }
            //Rule4
            if ($key == $bloodRequested) {
                $value = "true";
            }
            //Rule5
            if ($key == "Dont have all these desease") {
                $value = "true";
            }
            //Rule6
            if ($key > 45 && $key < 150) {
                $value = "true";
            }

            //rule7
            if (array_key_exists("never have sex with man", $knownfact)) {
                if (array_key_exists("never have sex with prostitute", $knownfact)) {
                    if (array_key_exists("never have paid or pay sex", $knownfact)) {
                        if (array_key_exists("have no sex partner", $knownfact)) {
                            if (array_key_exists("have no sex partner last 12 month", $knownfact)) {
                                if (array_key_exists("have no injectewd drug", $knownfact)) {
                                    if (array_key_exists("not fall above categories", $knownfact)) {
                                        if (array_key_exists("have tested not positive HIV", $knownfact)) {
                                            if (array_key_exists("not infected HIV", $knownfact)) {
                                                $knownfact["never have sex with man"] = "true";
                                                $knownfact["never have sex with prostitute"] = "true";
                                                $knownfact["never have paid or pay sex"] = "true";
                                                $knownfact["have no sex partner"] = "true";
                                                $knownfact["have no sex partner last 12 month"] = "true";
                                                $knownfact["have no injectewd drug"] = "true";
                                                $knownfact["not fall above categories"] = "true";
                                                $knownfact["have tested not positive HIV"] = "true";
                                                $knownfact["not infected HIV"] = "true";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            //Rule8
            if (array_key_exists("have no experience CJD1", $knownfact)) {
                if (array_key_exists("have no experience CJD2", $knownfact)) {
                    if (array_key_exists("have no experience CJD3", $knownfact)) {
                        $knownfact["have no experience CJD1"] = "true";
                        $knownfact["have no experience CJD2"] = "true";
                        $knownfact["have no experience CJD3"] = "true";
                    }
                }
            }
            //Rule9
            if (array_key_exists("have not piercedCuppingAcupuntureTattoo", $knownfact)) {
                if (array_key_exists("have no dengue", $knownfact)) {
                    if (array_key_exists("nobeauty injection", $knownfact)) {
                        if (array_key_exists("have no blood transfussion", $knownfact)) {
                            if (array_key_exists("have no surgical", $knownfact)) {
                                if (array_key_exists("have no injury", $knownfact)) {
                                    $knownfact["have not piercedCuppingAcupuntureTattoo"] = "true";
                                    $knownfact["have no dengue"] = "true";
                                    $knownfact["nobeauty injection"] = "true";
                                    $knownfact["have no blood transfussion"] = "true";
                                    $knownfact["have no surgical"] = "true";
                                    $knownfact["have no injury"] = "true";
                                    // $knownfact["have no misscariage"] = "true";
                                }
                            }
                        }
                    }
                }
            }
        }

        foreach ($generatedFact as $key => &$value) {

            //Rule10
            if (array_key_exists("your gender is male", $generatedFact)) {
                $generatedFact["your gender is male"] = "true";
            }
            if (array_key_exists("your gender is female", $generatedFact)) {
                if (array_key_exists("have no misscariage", $knownfact)) {
                    if (array_key_exists("not pregnant", $knownfact)) {

                        if (array_key_exists("not breastfeeding", $knownfact)) {
                            $knownfact["have no misscariage"] = "true";
                            $knownfact["not pregnant"] = "true";
                            $knownfact["not breastfeeding"] = "true";
                            $generatedFact["your gender is female"] = "true";
                            $generatedFact["female can donate"] = "true";
                        }
                    }
                }
            }


            //Rule11
            if (array_key_exists("suitable age", $generatedFact)) {
                if (array_key_exists("female can donate", $generatedFact) || array_key_exists("male can donate", $generatedFact)) {
                    if (array_key_exists("blood already replenish", $generatedFact)) {
                        if (array_key_exists("blood is identical with requestor", $generatedFact)) {
                            if (array_key_exists("You have no chronic desease", $generatedFact)) {
                                if (array_key_exists("weight is good", $generatedFact)) {
                                    if (array_key_exists("female can donate", $generatedFact)) {
                                        $generatedFact["female can donate"] = "true";
                                    } else {
                                        $generatedFact["male can donate"] = "true";
                                    }
                                    $generatedFact["suitable age"] = "true";
                                    $generatedFact["blood is identical with requestor"] = "true";
                                    $generatedFact["You have no chronic desease"] = "true";
                                    $generatedFact["weight is good"] = "true";
                                    $generatedFact["blood already replenish"] = "true";
                                }
                            }
                        }
                    }
                }
            }

            //Rule12
            if (array_key_exists("you are clean", $generatedFact)) {
                if (array_key_exists("you are vCJD free", $generatedFact)) {
                    if (array_key_exists("basic requirement passed", $generatedFact)) {
                        $generatedFact["you are clean"] = "true";
                        $generatedFact["you are vCJD free"] = "true";
                        $generatedFact["basic requirement passed"] = "true";
                        $generatedFact["your six month before is clean"] = "true";
                        $generatedFact["You are eligible to donate"] = "true";
                    }
                }
            }
        }
        return $generatedFact;
    }


    public function inferenceEngine($bloodType)
    {
        $eligibleDonor = array();
        $users = User::where("role", "=", "user")->get();
        $count = 0;
        $knownfact = array();
        $generatedFact = array();
        foreach ($users as $user) {
            $qualification = Qualification::where('user_id', $user->id)->first();
            $this->knowledgeBase($user, $qualification, $bloodType, $knownfact, $generatedFact);

            $this->workingMemory($bloodType, $knownfact, $generatedFact);

            //check if there are rules that are not matching
            foreach ($generatedFact as $key => $value) {
                if ($value == "false") {
                    print $key;
                    $count++;
                }
            }
            foreach ($knownfact as $key => $value) {
                if ($value == "false") {
                    $count++;
                }
            }
            //if there are no false value, it will indicate that all rules are matched and that user is selected
            print $count . " ";
            if ($count == 0) {
                array_push($eligibleDonor, $user);
            }
            $count = 0;
            $knownfact = [];
            $generatedFact = [];
        }
        return $eligibleDonor;
    }
}
