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
        $this->call(TeamSeeder::class);
        $this->call(PlayerSeeder::class);

        $this->call(QuarterBackSeeder::class);
        $this->call(RunningBackSeeder::class);
        $this->call(WideReceiverSeeder::class);
        $this->call(TightEndSeeder::class);
        $this->call(KickerSeeder::class);
        $this->call(DefenseSeeder::class);
    }
}
