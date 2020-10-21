<?php

namespace App\Traits;

use App\Student;
use App\User;


trait InferenceEngineTrait
{
    public function knowledgeBase($request, $bloodType, &$knownfact, &$generatedFact)
    {
        $kf1 = $request->age;
        $kf2 = $request->gender;
        // $kf3 = $request->latest_donations;
        $kf4 = $request->bloodType;
        // $kf5 = $request->chronicDesease;
        $kf6 = $request->weight;
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
        // if ($kf3 > 90) {
        //     $gf3 = "blood already replenish";
        // } else {
        //     $gf3 = "blood not fully replenish";
        // }
        //Rule4
        if ($kf4 == $bloodType) {
            $gf4 = "blood is identical with requestor";
        } else {
            $gf4 = "blood not identical";
        }
        //Rule5
        // if ($kf5 == "Yes") {
        //     $gf5 = "no risk";
        // } else {
        //     $gf5 = "there are risk";
        // }
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
        // if ($gf1 == "suitable age" && $gf2 == "you can donate" && $gf3 == "blood already replenish" && $gf4 == "blood is identical with requestor" && $gf5 == "no risk" && $gf6 == "weight is good") {
        //     $gf7 = "you are eligible";
        // } else {
        //     $gf7 = "you are not eligible";
        // }
        $knownfact = array($kf1 => "false", $kf2 => "false", $kf4 => "false", $kf6 => "false");
        $generatedFact = array($gf1 => "false", $gf2 => "false", $gf4 => "false", $gf6 => "false");
    }
    public function workingMemory($bloodRequested, &$a, &$b)
    {
        foreach ($a as $key => &$value) {
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
            // if ($key > 90) {
            //     $gf3 = "blood already replenish";
            //     $update = array($gf3 => true);
            //     array_replace($knownfact, $update);
            // } else {
            //     $gf3 = "blood not fully replenish";
            // }
            //Rule4
            if ($key == $bloodRequested) {
                $gf4 = "blood is identical with requestor";
                $value = "true";
            } else {
                $gf4 = "blood not identical";
            }
            //Rule5
            // if ($key == "Yes") {
            //     $gf5 = "no risk";
            //     $update = array($gf5 => true);
            //     array_replace($knownfact, $update);
            // } else {
            //     $gf5 = "there are risk";
            // }
            //Rule6
            if ($key > 50 && $key < 150) {
                $gf6 = "weight is good";
                $value = "true";
            } else {
                $gf6 = "underweight";
            }



            //Rule7
        }
        foreach ($b as $key => &$value) {
            if ($key == "suitable age") {
                $value = "true";
            }

            if ($key == "you can donate" && $b["suitable age"] == true) {
                $value = "true";
            }

            // if ($key == "blood already replenish" && $generatedFact["you can donate"] == true) {
            //     $update = array($key => true);
            //     array_replace($generatedFact, $update);
            // }

            if ($key == "blood is identical with requestor" && $b["suitable age"] == true) {
                $value = "true";
            }

            // if ($key == "no risk" && $generatedFact["suitable ageblood is identical with requestor"] == true) {
            //     $update = array($key => true);
            //     array_replace($generatedFact, $update);
            // }

            if ($key == "weight is good" && $b["blood is identical with requestor"] == true) {
                $value = "true";
            }
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

            $this->knowledgeBase($user, $bloodType, $knownfact, $generatedFact);
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
