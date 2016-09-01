<?php

use App\Models\Player;
use App\Models\QuarterBack;
use Illuminate\Database\Seeder;

class QuarterBackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quarter_backs = fopen(database_path('seeds/data/qb.tsv'), 'r');

        while ($quarter_back = fgetcsv($quarter_backs, 0, "\t")) {
            $this->createQuarterBack($quarter_back);
        }
    }

    public function createQuarterBack($quarter_back)
    {
        $params = [
            'player_id'       => Player::where('name', $quarter_back[0])->first()->id,
            'completions'     => preg_replace('/[^0-9.]/s', '', $quarter_back[4]),
            'pass_attempts'   => preg_replace('/[^0-9.]/s', '', $quarter_back[5]),
            'pass_yards'      => preg_replace('/[^0-9.]/s', '', $quarter_back[7]),
            'pass_touchdowns' => preg_replace('/[^0-9.]/s', '', $quarter_back[9]),
            'interceptions'   => preg_replace('/[^0-9.]/s', '', $quarter_back[10]),
            'rating'          => preg_replace('/[^0-9.]/s', '', $quarter_back[11]),
            'carries'         => preg_replace('/[^0-9.]/s', '', $quarter_back[12]),
            'rush_yards'      => preg_replace('/[^0-9.]/s', '', $quarter_back[13]),
            'rush_touchdowns' => preg_replace('/[^0-9.]/s', '', $quarter_back[15]),
        ];

        QuarterBack::create($params);
    }
}
