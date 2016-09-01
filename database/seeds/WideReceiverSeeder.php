<?php

use App\Models\Player;
use App\Models\WideReceiver;
use Illuminate\Database\Seeder;

class WideReceiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wide_receivers = fopen(database_path('seeds/data/wr.tsv'), 'r');

        while ($wide_receiver = fgetcsv($wide_receivers, 0, "\t")) {
            $this->createWideReceiver($wide_receiver);
        }
    }

    public function createWideReceiver($wide_receiver)
    {
        $params = [
            'player_id'            => Player::where('name', $wide_receiver[0])->first()->id,
            'targets'              => preg_replace('/[^0-9.]/s', '', $wide_receiver[4]),
            'receptions'           => preg_replace('/[^0-9.]/s', '', $wide_receiver[5]),
            'reception_yards'      => preg_replace('/[^0-9.]/s', '', $wide_receiver[7]),
            'reception_touchdowns' => preg_replace('/[^0-9.]/s', '', $wide_receiver[8]),
            'longest_reception'    => preg_replace('/[^0-9.]/s', '', $wide_receiver[9]),
            'carries'              => preg_replace('/[^0-9.]/s', '', $wide_receiver[12]),
            'rush_yards'           => preg_replace('/[^0-9.]/s', '', $wide_receiver[13]),
            'rush_touchdowns'      => preg_replace('/[^0-9.]/s', '', $wide_receiver[14]),
            'fumbles'              => preg_replace('/[^0-9.]/s', '', $wide_receiver[15]),
            'fumbles_lost'         => preg_replace('/[^0-9.]/s', '', $wide_receiver[16]),
        ];

        WideReceiver::create($params);
    }
}
