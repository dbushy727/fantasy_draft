<?php

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->getData();

        $this->data->each(function ($data, $position) {
            $model = studly_case($position);

            while ($player = fgetcsv($data, 0, "\t")) {
                $this->createPlayer($player);
            }
        });
    }

    public function getData()
    {
        return collect([
            'quarter_back'  => fopen(database_path('seeds/data/qb.tsv'), 'r'),
            'running_back'  => fopen(database_path('seeds/data/rb.tsv'), 'r'),
            'wide_receiver' => fopen(database_path('seeds/data/wr.tsv'), 'r'),
            'tight_end'     => fopen(database_path('seeds/data/te.tsv'), 'r'),
            'kicker'        => fopen(database_path('seeds/data/k.tsv'), 'r'),
        ]);
    }

    public function createPlayer($player)
    {
        $name          = $player[0];
        $position      = $player[1];
        $team_id       = Team::where('abbr', $player[2])->first()->id;
        $games_played  = $player[3];
        $total_fantasy = last($player);

        Player::create(compact('name', 'position', 'team_id', 'games_played', 'total_fantasy'));
    }
}
