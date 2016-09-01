<?php

use App\Models\Team;
use App\Models\Defense;
use Illuminate\Database\Seeder;

class DefenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defenses = fopen(database_path('seeds/data/dst.tsv'), 'r');

        while ($defense = fgetcsv($defenses, 0, "\t")) {
            $this->createDefense($defense);
        }
    }

    public function createDefense($defense)
    {
        $params = [
            'team_id'              => Team::where('name', $defense[0])->first()->id,
            'tackles_for_loss'     => preg_replace('/[^0-9.]/s', '', $defense[4]),
            'sacks'                => preg_replace('/[^0-9.]/s', '', $defense[5]),
            'interceptions'        => preg_replace('/[^0-9.]/s', '', $defense[7]),
            'fumbles_recovered'    => preg_replace('/[^0-9.]/s', '', $defense[8]),
            'safeties'             => preg_replace('/[^0-9.]/s', '', $defense[9]),
            'defensive_touchdowns' => preg_replace('/[^0-9.]/s', '', $defense[10]),
            'return_touchdowns'    => preg_replace('/[^0-9.]/s', '', $defense[11]),
            'points_allowed'       => preg_replace('/[^0-9.]/s', '', $defense[12]),
        ];

        Defense::create($params);
    }
}
