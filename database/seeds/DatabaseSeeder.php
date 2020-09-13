<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call([
            UserSeeder::class,
            EventSeeder::class,
            CommentSeeder::class,
            RuleSeeder::class,
            RequestSeeder::class,
            DonationSeeder::class,

        ]);
    }
}
