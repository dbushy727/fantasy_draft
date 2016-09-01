<?php

use App\Models\Player;
use App\Models\TightEnd;
use Illuminate\Database\Seeder;

class TightEndSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tight_ends = fopen(database_path('seeds/data/te.tsv'), 'r');

        while ($tight_end = fgetcsv($tight_ends, 0, "\t")) {
            $this->createTightEnd($tight_end);
        }
    }

    public function createTightEnd($tight_end)
    {
        $params = [
            'player_id'            => Player::where('name', $tight_end[0])->first()->id,
            'targets'              => preg_replace('/[^0-9.]/s', '', $tight_end[4]),
            'receptions'           => preg_replace('/[^0-9.]/s', '', $tight_end[5]),
            'reception_yards'      => preg_replace('/[^0-9.]/s', '', $tight_end[7]),
            'reception_touchdowns' => preg_replace('/[^0-9.]/s', '', $tight_end[8]),
            'longest_reception'    => preg_replace('/[^0-9.]/s', '', $tight_end[9]),
            'carries'              => preg_replace('/[^0-9.]/s', '', $tight_end[12]),
            'rush_yards'           => preg_replace('/[^0-9.]/s', '', $tight_end[13]),
            'rush_touchdowns'      => preg_replace('/[^0-9.]/s', '', $tight_end[14]),
            'fumbles'              => preg_replace('/[^0-9.]/s', '', $tight_end[15]),
            'fumbles_lost'         => preg_replace('/[^0-9.]/s', '', $tight_end[16]),
        ];

        TightEnd::create($params);
    }
}
