<?php

use App\Achievement;
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
            Achievement::class,
            Notification::class,


        ]);
    }
}
