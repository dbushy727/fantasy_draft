<?php

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createTeams();
        $this->assignAbbreviations();
    }

    public function createTeams()
    {
        $teams_data = fopen(database_path('seeds/data/teams.tsv'), 'r');

        while ($team = fgetcsv($teams_data, 0, "\t")) {
            $this->createTeam();
        }
    }

    public function assignAbbreviations()
    {
        $abbrs = [["abbr" => "ARI", "name" => "Arizona Cardinals", ], ["abbr" => "ATL", "name" => "Atlanta Falcons", ], ["abbr" => "BAC", "name" => "Baltimore Colts", ], ["abbr" => "BAL", "name" => "Baltimore Ravens", ], ["abbr" => "BOB", "name" => "Boston Braves", ], ["abbr" => "BOR", "name" => "Boston Redskins", ], ["abbr" => "BOS", "name" => "Boston Patriots", ], ["abbr" => "BUF", "name" => "Buffalo Bills", ], ["abbr" => "CAR", "name" => "Carolina Panthers", ], ["abbr" => "CHC", "name" => "Chicago Cardinals", ], ["abbr" => "CHI", "name" => "Chicago Bears", ], ["abbr" => "CHS", "name" => "Chicago Staleys", ], ["abbr" => "CIN", "name" => "Cincinnati Bengals", ], ["abbr" => "CLE", "name" => "Cleveland Browns", ], ["abbr" => "CLR", "name" => "Cleveland Rams", ], ["abbr" => "DAL", "name" => "Dallas Cowboys", ], ["abbr" => "DAT", "name" => "Dallas Texans (1960-62)", ], ["abbr" => "DEC", "name" => "Decatur Staleys", ], ["abbr" => "DEN", "name" => "Denver Broncos", ], ["abbr" => "DET", "name" => "Detroit Lions", ], ["abbr" => "GB", "name" => "Green Bay Packers", ], ["abbr" => "HOO", "name" => "Houston Oilers", ], ["abbr" => "HOU", "name" => "Houston Texans", ], ["abbr" => "IND", "name" => "Indianapolis Colts", ], ["abbr" => "JAX", "name" => "Jacksonville Jaguars", ], ["abbr" => "KC", "name" => "Kansas City Chiefs", ], ["abbr" => "LAC", "name" => "Los Angeles Chargers", ], ["abbr" => "LAI", "name" => "Los Angeles Raiders", ], ["abbr" => "LA", "name" => "Los Angeles Rams", ], ["abbr" => "MIA", "name" => "Miami Dolphins", ], ["abbr" => "MIN", "name" => "Minnesota Vikings", ], ["abbr" => "NE", "name" => "New England Patriots", ], ["abbr" => "NO", "name" => "New Orleans Saints", ], ["abbr" => "NYG", "name" => "New York Giants", ], ["abbr" => "NYJ", "name" => "New York Jets", ], ["abbr" => "NYT", "name" => "New York Titans", ], ["abbr" => "OAK", "name" => "Oakland Raiders", ], ["abbr" => "PHI", "name" => "Philadelphia Eagles", ], ["abbr" => "PHX", "name" => "Phoenix Cardinals", ], ["abbr" => "PIP", "name" => "Pittsburgh Pirates", ], ["abbr" => "PIT", "name" => "Pittsburgh Steelers", ], ["abbr" => "POR", "name" => "Portsmouth Spartans", ], ["abbr" => "SD", "name" => "San Diego Chargers", ], ["abbr" => "SEA", "name" => "Seattle Seahawks", ], ["abbr" => "SF", "name" => "San Francisco 49ers", ], ["abbr" => "SLC", "name" => "St. Louis Cardinals", ], ["abbr" => "STL", "name" => "St. Louis Rams", ], ["abbr" => "TB", "name" => "Tampa Bay Buccaneers", ], ["abbr" => "TEN", "name" => "Tennessee Titans", ], ["abbr" => "TNO", "name" => "Tennessee Oilers", ], ["abbr" => "WAS", "name" => "Washington Redskins", ], ];

        foreach ($abbrs as $team_info) {
            $team = Team::where('name', $team_info['name'])->first();

            if (!$team) {
                continue;
            }

            $team->update(['abbr' => $team_info['abbr']]);
        }
    }

    public function createTeam($team)
    {
        $name           = $team[0];
        $wins           = $team[1];
        $losses         = $team[2];
        $points_for     = $team[5];
        $points_against = $team[6];

        Team::create(compact('name', 'wins', 'losses', 'points_for', 'points_against'));
    }
}
