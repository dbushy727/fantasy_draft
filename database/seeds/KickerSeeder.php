<?php

use App\Models\Player;
use App\Models\Kicker;
use Illuminate\Database\Seeder;

class KickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kickers = fopen(database_path('seeds/data/k.tsv'), 'r');

        while ($kicker = fgetcsv($kickers, 0, "\t")) {
            $this->createKicker($kicker);
        }
    }

    public function createKicker($kicker)
    {
        $params = [
            'player_id'             => Player::where('name', $kicker[0])->first()->id,
            'field_goals_made'      => preg_replace('/[^0-9.]/s', '', $kicker[4]),
            'field_goals_attempts'  => preg_replace('/[^0-9.]/s', '', $kicker[5]),
            'longest_field_goal'    => preg_replace('/[^0-9.]/s', '', $kicker[7]),
            'extra_points_made'     => preg_replace('/[^0-9.]/s', '', $kicker[8]),
            'extra_points_attempts' => preg_replace('/[^0-9.]/s', '', $kicker[9]),
        ];

        Kicker::create($params);
    }
}
