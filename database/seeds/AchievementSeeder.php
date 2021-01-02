<?php

use Illuminate\Database\Seeder;
use App\Achievement;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Achievement::create(
            // [
            //     'type' => 'Life Saver',
            //     'description' => 'Congratulation! You have donated the blood which is equivalent to saving 3 lives!',
            //     'imageURL' => "assets/images/lifeSaver.png",
            // ],
            // [
            //     'type' => 'Super Hero',
            //     'description' => 'Congratulation! You have donated the blood 3 times which is equivalent to saving 9 lives!',
            //     'imageURL' => "assets/images/superHero.png",
            // ],
            // [
            //     'type' => 'World Saver',
            //     'description' => 'Congratulation! You have donated the blood 3 times which is equivalent to saving 9 lives!',
            //     'imageURL' => "assets/images/worldSaver.png",
            // ],
            // [
            //     'type' => 'Super Man',
            //     'description' => 'Congratulation! You have donated the blood 15 times which is equivalent to saving 45 lives!',
            //     'imageURL' => "assets/images/superMan.png",
            // ],
            // [
            //     'type' => 'Universe Saver',
            //     'description' => 'Congratulation! You have donated the blood 30 times which is equivalent to saving 90 lives!',
            //     'imageURL' => "assets/images/univerSaver.png",
            // ]
        );
    }
}
