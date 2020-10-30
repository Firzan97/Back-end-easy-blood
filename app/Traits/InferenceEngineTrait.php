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
        $datenow = date("Y-m-d h:i:s.u");
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i.u', $datenow);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i.u', $qualification->lastDonation);
        $lastDonationDuration = $to->diffInDays($from);
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
        $gf1 = "";
        $gf2 = "";
        $gf3 = "";
        $gf4 = "";
        $gf5 = "";
        $gf6 = "";
        $gf7 = "";
        $gf8 = "";
        $gf9 = "";




        //Rule1
        if ($kf1 > 18) {
            $gf1 = "suitable age";
            $knownfact[$kf1] = "false";
            $generatedFact[$gf1] = "false";
        }
        //  else {
        //     $gf1 = "underage";
        // }
        //Rule2
        if ($kf2 == "Male") {
            $gf2 = "you can donate";
            $knownfact[$kf2] = "false";
            $generatedFact[$gf2] = "false";
        }
        //  else {
        //     $gf2 = "you can donate";
        // }
        //Rule3
        if ($kf3 > 90) {
            $gf3 = "blood already replenish";
            $knownfact[$kf3] = "false";
            $generatedFact[$gf3] = "false";
        }
        // else {
        //     $gf3 = "blood not fully replenish";
        // }
        //Rule4
        if ($kf4 == $bloodType) {
            $gf4 = "blood is identical with requestor";
            $knownfact[$kf4] = "false";
            $generatedFact[$gf4] = "false";
        }
        //  else {
        //     $gf4 = "blood not identical";
        // }
        //Rule5
        if ($kf5 == "Dont have all these desease") {
            $gf5 = "You have no chronic desease";
            $knownfact[$kf5] = "false";
            $generatedFact[$gf5] = "false";
        }
        // else {
        //     $gf5 = "You have chronic desease";
        // }
        //Rule6
        if ($kf6 > 45 && $kf6 < 150) {
            $gf6 = "weight is good";
            $knownfact[$kf6] = "false";
            $generatedFact[$gf6] = "false";
        }
        // else {
        //     $gf6 = "underweight";
        // }
        //
        if ($gf1 == "suitable age" && $gf2 == "you can donate" &&  $gf4 == "blood is identical with requestor" &&  $gf6 == "weight is good") {
            $gf7 = "basic requirement passed";
            $generatedFact[$gf7] = "false";
        }
        // else {
        //     $gf7 = "you are not eligible";
        // }
        if ($kf7 == "never have sex with man" && $kf8 == "never have sex with prostitute" && $kf9 == "never have paid or pay sex" && $kf10 == "have no sex partner" && $kf11 == "have no sex partner last 12 month"  && $kf12 == "have no injectewd drug" && $kf13 == "not fall above categories"  && $kf14 == "have tested not positive HIV" && $kf15 == "not infected HIV") {
            $gf8 = "you are clean";
            $knownfact[$kf7] = "false";
            $knownfact[$kf8] = "false";
            $knownfact[$kf9] = "false";
            $knownfact[$kf10] = "false";
            $knownfact[$kf11] = "false";
            $knownfact[$kf12] = "false";
            $knownfact[$kf13] = "false";
            $knownfact[$kf14] = "false";
            $knownfact[$kf15] = "false";
            $generatedFact[$gf8] = "false";
        }
        //  else {
        //     $gf8 = "you are not clean";
        // }

        if ($kf16 == "have no experience CJD1" && $kf17 == "have no experience CJD2" && $kf18 == "have no experience CJD3") {
            $gf9 = "you are vCJD free";
            $knownfact[$kf16] = "false";
            $knownfact[$kf17] = "false";
            $knownfact[$kf18] = "false";
            $generatedFact[$gf9] = "false";
        }
        // else {
        //     $gf9 = "you are not vCJD free";
        // }
        // if ($gf1 == "suitable age" && $gf2 == "you can donate" && $gf3 == "blood already replenish" && $gf4 == "blood is identical with requestor" && $gf5 == "no risk" && $gf6 == "weight is good") {
        //     $gf7 = "you are eligible";
        // } else {
        //     $gf7 = "you are not eligible";
        // }
        // $knownfact = array($kf1 => "false", $kf2 => "false", $kf3 => "false", $kf4 => "false", $kf5 => "false", $kf6 => "false", $kf7 => "false", $kf8 => "false", $kf9 => "false", $kf10 => "false", $kf11 => "false", $kf12 => "false", $kf13 => "false", $kf14 => "false", $kf15 => "false", $kf16 => "false", $kf17 => "false", $kf18 => "false");
        // $generatedFact = array($gf1 => "false", $gf2 => "false", $gf3 => "false", $gf4 => "false", $gf5 => "false", $gf6 => "false", $gf7 => "false", $gf8 => "false", $gf9 => "false");
    }
    public function workingMemory($bloodRequested, &$a, &$b)
    {
        foreach ($a as $key => &$value) {

            //rule1
            if ($key > 18) {
                $gf1 = "suitable age";
                $value = "true";
            }
            //Rule2
            if ($key == "Female") {
                // if ($request->latest_pregnant > 42) {
                //     $gf2 = "you can donate";
                //     $value = "true";
                // } else {
                //     $gf2 = "need to wait 42 days after pregnant";
                // }
                print("female");
            }

            if ($key == "Male") {
                $gf2 = "you can donate";
                $value = "true";
            }
            //Rule3
            if ($key > 90) {
                $gf3 = "blood already replenish";
                $value = "true";
            }
            //Rule4
            if ($key == $bloodRequested) {
                $gf4 = "blood is identical with requestor";
                $value = "true";
            }
            //Rule5
            if ($key == "Dont have all these desease") {
                $gf5 = "You have no chronic desease";
                // $update = array($gf5 => true);
                // array_replace($knownfact, $update);
                $value = "true";
            }
            //Rule6
            if ($key > 45 && $key < 150) {
                $gf6 = "weight is good";
                $value = "true";
            }

            //rule8
            if (array_key_exists("never have sex with man", $a)) {
                if (array_key_exists("never have sex with prostitute", $a)) {
                    if (array_key_exists("never have paid or pay sex", $a)) {
                        if (array_key_exists("have no sex partner", $a)) {
                            if (array_key_exists("have no sex partner last 12 month", $a)) {
                                if (array_key_exists("have no injectewd drug", $a)) {
                                    if (array_key_exists("not fall above categories", $a)) {
                                        if (array_key_exists("have tested not positive HIV", $a)) {
                                            if (array_key_exists("not infected HIV", $a)) {
                                                $a["never have sex with man"] = "true";
                                                $a["never have sex with prostitute"] = "true";
                                                $a["never have paid or pay sex"] = "true";
                                                $a["have no sex partner"] = "true";
                                                $a["have no sex partner last 12 month"] = "true";
                                                $a["have no injectewd drug"] = "true";
                                                $a["not fall above categories"] = "true";
                                                $a["have tested not positive HIV"] = "true";
                                                $a["not infected HIV"] = "true";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (array_key_exists("have no experience CJD1", $a)) {
                if (array_key_exists("have no experience CJD2", $a)) {
                    if (array_key_exists("have no experience CJD3", $a)) {
                        $a["have no experience CJD1"] = "true";
                        $a["have no experience CJD2"] = "true";
                        $a["have no experience CJD3"] = "true";
                    }
                }
            }
        }
        foreach ($b as $key => &$value) {


            //Rule7
            if (array_key_exists("suitable age", $b)) {
                if (array_key_exists("you can donate", $b)) {
                    if (array_key_exists("blood already replenish", $b)) {
                        if (array_key_exists("blood is identical with requestor", $b)) {
                            if (array_key_exists("You have no chronic desease", $b)) {
                                if (array_key_exists("weight is good", $b)) {
                                    $b["suitable age"] = "true";
                                    $b["you can donate"] = "true";
                                    $b["blood is identical with requestor"] = "true";
                                    $b["You have no chronic desease"] = "true";
                                    $b["weight is good"] = "true";
                                    $b["blood already replenish"] = "true";
                                }
                            }
                        }
                    }
                }
            }

            //Rule9
            if (array_key_exists("basic requirement passed", $b)) {
                if (array_key_exists("you are vCJD free", $b)) {
                    if (array_key_exists("you are clean", $b)) {
                        $b["basic requirement passed"] = "true";
                        $b["you are vCJD free"] = "true";
                        $b["you are clean"] = "true";
                    }
                }
            }



            ///

            //rule8

        }
        foreach ($a as $key => $value) {
            print("key" . $key);
            print("value" . $value);
            print("\n");
        }
        foreach ($b as $key => $value) {
            print("key" . $key);
            print("value" . $value);
            print("\n");
        }
    }


    public function inferenceEngine($bloodType)
    {
        $eligibleDonor = array();
        $users = User::all();
        $count = 0;
        $knownfact = array();
        $generatedFact = array();
        foreach ($users as $user) {
            $qualification = Qualification::where('user_id', $user->id)->first();
            $this->knowledgeBase($user, $qualification, $bloodType, $knownfact, $generatedFact);
            $b = $knownfact;
            $a = $generatedFact;
            $this->workingMemory($bloodType, $knownfact, $generatedFact);
            foreach ($generatedFact as $key => $value) {
                if ($generatedFact[$key] == "false") {
                    $count++;
                }
            }
            foreach ($knownfact as $key => $value) {
                if ($knownfact[$key] == "false") {
                    $count++;
                }
            }
            if ($count == 0) {
                array_push($eligibleDonor, $user);
            }
        }
        return $eligibleDonor;
    }
}
