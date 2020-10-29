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






        //Rule1
        if ($kf1 > 18) {
            $gf1 = "suitable age";
        } else {
            $gf1 = "underage";
        }
        //Rule2
        if ($kf2 == "Female") {
            if ($request->latest_pregnant > 42) {
                $gf2 = "you can donate";
            } else {
                $gf2 = "need to wait 42 days after pregnant";
            }
        } else {
            $gf2 = "you can donate";
        }
        //Rule3
        if ($kf3 > 90) {
            $gf3 = "blood already replenish";
        } else {
            $gf3 = "blood not fully replenish";
        }
        //Rule4
        if ($kf4 == $bloodType) {
            $gf4 = "blood is identical with requestor";
        } else {
            $gf4 = "blood not identical";
        }
        //Rule5
        if ($kf5 == "No") {
            $gf5 = "You have no chronic desease";
        } else {
            $gf5 = "You have chronic desease";
        }
        //Rule6
        if ($kf6 > 50 && $kf6 < 150) {
            $gf6 = "weight is good";
        } else {
            $gf6 = "underweight";
        }
        //
        if ($gf1 == "suitable age" && $gf2 == "you can donate" &&  $gf4 == "blood is identical with requestor" &&  $gf6 == "weight is good") {
            $gf7 = "you are eligible";
        } else {
            $gf7 = "you are not eligible";
        }
        if ($kf7 == false && $kf8 == false && $kf9 == false && $kf10 == false && $kf11 == false  && $kf12 == false && $kf13 == false  && $kf14 == false && $kf15 == false) {
            $gf8 = "you are clean";
        } else {
            $gf8 = "you are not clean";
        }

        if ($kf16 == false && $kf17 == false && $kf18 == false) {
            $gf9 = "you are vCJD free";
        } else {
            $gf9 = "you are not vCJD free";
        }
        // if ($gf1 == "suitable age" && $gf2 == "you can donate" && $gf3 == "blood already replenish" && $gf4 == "blood is identical with requestor" && $gf5 == "no risk" && $gf6 == "weight is good") {
        //     $gf7 = "you are eligible";
        // } else {
        //     $gf7 = "you are not eligible";
        // }
        $knownfact = array($kf1 => "false", $kf2 => "false", $kf4 => "false", $kf6 => "false", $kf7 => "false", $kf8 => "false", $kf9 => "false", $kf10 => "false", $kf11 => "false", $kf12 => "false", $kf13 => "false", $kf14 => "false", $kf15 => "false", $kf16 => "false", $kf17 => "false", $kf18 => "false");
        $generatedFact = array($gf1 => "false", $gf2 => "false", $gf3 => "false", $gf4 => "false", $gf5 => "false", $gf6 => "false", $gf7 => "false", $gf8 => "false", $gf9 => "false");
    }
    public function workingMemory($bloodRequested, &$a, &$b)
    {
        foreach ($a as $key => &$value) {
            //rule1
            if ($key > 18) {
                $gf1 = "suitable age";
                $value = "true";
            } else {
                $gf1 = "underage";
            }
            //Rule2
            if ($key == "Female") {
                if ($request->latest_pregnant > 42) {
                    $gf2 = "you can donate";
                    $value = "true";
                } else {
                    $gf2 = "need to wait 42 days after pregnant";
                }
            } else {
                $gf2 = "you can donate";
                $value = "true";
            }
            //Rule3
            if ($key > 90) {
                $gf3 = "blood already replenish";
                $value = "true";
            } else {
                $gf3 = "blood not fully replenish";
            }
            //Rule4
            if ($key == $bloodRequested) {
                $gf4 = "blood is identical with requestor";
                $value = "true";
            } else {
                $gf4 = "blood not identical";
            }
            //Rule5
            if ($key == "No") {
                $gf5 = "You have no chronic desease";
                // $update = array($gf5 => true);
                // array_replace($knownfact, $update);
                $value = "true";
            } else {
                $gf5 = "You have chronic desease";
            }
            //Rule6
            if ($key > 50 && $key < 150) {
                $gf6 = "weight is good";
                $value = "true";
            } else {
                $gf6 = "underweight";
            }
        }
        foreach ($b as $key => &$value) {


            //Rule7
            if ($key == "suitable age") {
                $value = "true";
            }

            if ($key == "you can donate" && $b["suitable age"] == "true") {
                $value = "true";
            }

            if ($key == "blood already replenish" && $generatedFact["you can donate"] == "true") {
                // $update = array($key => true);
                // array_replace($generatedFact, $update);
                $value == "true";
            }

            if ($key == "blood is identical with requestor" && $b["suitable age"] == "true") {
                $value = "true";
            }

            if ($key == "You have no chronic desease" && $generatedFact["suitable ageblood is identical with requestor"] == "true") {
                $value == "true";
            }

            if ($key == "weight is good" && $b["blood is identical with requestor"] == "true") {
                $value = "true";
            }
            ///

            //rule8

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
            $qualification = Qualification::where('user_id', $user->id)->get();

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
