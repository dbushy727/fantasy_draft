<?php

use App\Models\Player;
use App\Models\RunningBack;
use Illuminate\Database\Seeder;

class RunningBackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $running_backs = fopen(database_path('seeds/data/rb.tsv'), 'r');

        while ($running_back = fgetcsv($running_backs, 0, "\t")) {
            $this->createRunningBack($running_back);
        }
    }

    public function createRunningBack($running_back)
    {
        $params = [
            'player_id'            => Player::where('name', $running_back[0])->first()->id,
            'carries'              => preg_replace('/[^0-9.]/s', '', $running_back[4]),
            'rush_yards'           => preg_replace('/[^0-9.]/s', '', $running_back[5]),
            'rush_touchdowns'      => preg_replace('/[^0-9.]/s', '', $running_back[7]),
            'targets'              => preg_replace('/[^0-9.]/s', '', $running_back[8]),
            'receptions'           => preg_replace('/[^0-9.]/s', '', $running_back[9]),
            'reception_yards'      => preg_replace('/[^0-9.]/s', '', $running_back[10]),
            'reception_touchdowns' => preg_replace('/[^0-9.]/s', '', $running_back[11]),
            'fumbles'              => preg_replace('/[^0-9.]/s', '', $running_back[12]),
            'fumbles_lost'         => preg_replace('/[^0-9.]/s', '', $running_back[13]),
        ];

        RunningBack::create($params);
    }
}
