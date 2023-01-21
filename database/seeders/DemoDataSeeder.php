<?php

namespace Database\Seeders;

use App\Entities\Commands\Models\Command;
use App\Entities\Competitions\Models\Competition;
use App\Entities\Countries\Models\Country;
use App\Entities\Matches\FootballMatch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DemoDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->countries();
        $this->competitions();
        $this->commands();
        $this->matches();
    }

    public function countries()
    {
        $data = [
            ['name' => 'Russia'],
            ['name' => 'USA'],
            ['name' => 'England'],
            ['name' => 'Germany'],
            ['name' => 'Italy'],
            ['name' => 'Spain'],
            ['name' => 'France'],
            ['name' => 'Portugal'],
            ['name' => 'Netherlands'],
        ];

        foreach ($data as $item) {
            Country::firstOrCreate($item);
        }
    }

    public function competitions()
    {
        $data = [
            [
                'name' => 'RPL',
                'priority' => 1,
                'country_id' => Country::where('name', 'Russia')->first()->id
            ],
            [
                'name' => 'APL',
                'priority' => 1,
                'country_id' => Country::where('name', 'England')->first()->id
            ],
            [
                'name' => 'LaLiga',
                'priority' => 1,
                'country_id' => Country::where('name', 'Spain')->first()->id
            ],
            [
                'name' => 'Serie A',
                'priority' => 1,
                'country_id' => Country::where('name', 'Italy')->first()->id
            ],
            [
                'name' => 'Bundesliga',
                'priority' => 1,
                'country_id' => Country::where('name', 'Germany')->first()->id
            ],
            [
                'name' => 'Liga 1',
                'priority' => 1,
                'country_id' => Country::where('name', 'France')->first()->id
            ],
        ];

        foreach ($data as $item) {
            Competition::firstOrCreate($item);
        }
    }

    public function commands()
    {
        $data = [
            [
                'name' => 'Zenit',
                'position' => 1,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Spartak',
                'position' => 2,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Rostov',
                'position' => 3,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Dinamo',
                'position' => 4,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'CSKA',
                'position' => 5,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Ahmat',
                'position' => 6,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Orenburg',
                'position' => 7,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Krasnodar',
                'position' => 8,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Sochi',
                'position' => 9,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Ural',
                'position' => 10,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Krylya Sovetov',
                'position' => 11,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Pari NN',
                'position' => 12,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Fakel',
                'position' => 13,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Locomotiv',
                'position' => 14,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Khimki',
                'position' => 15,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
            [
                'name' => 'Torpedo',
                'position' => 16,
                'competition_id' => Competition::where('name', 'RPL')->first()->id
            ],
        ];

        foreach ($data as $item) {
            Command::firstOrCreate($item);
        }
    }

    public function matches()
    {
        $data = [
            [
                'command_first_id' => DB::table('commands')->where('name', 'Zenit')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Spartak')->first()->id,
                'winner_id' => DB::table('commands')->where('name', 'Spartak')->first()->id,
                'command_first_goals' => 1,
                'command_second_goals' => 3,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Rostov')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Dinamo')->first()->id,
                'winner_id' => DB::table('commands')->where('name', 'Rostov')->first()->id,
                'command_first_goals' => 2,
                'command_second_goals' => 0,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'CSKA')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Ahmat')->first()->id,
                'winner_id' => null,
                'command_first_goals' => 0,
                'command_second_goals' => 0,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Orenburg')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Krasnodar')->first()->id,
                'winner_id' => null,
                'command_first_goals' => 3,
                'command_second_goals' => 3,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Sochi')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Ural')->first()->id,
                'winner_id' => DB::table('commands')->where('name', 'Ural')->first()->id,
                'command_first_goals' => 1,
                'command_second_goals' => 2,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Krylya Sovetov')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Pari NN')->first()->id,
                'winner_id' => DB::table('commands')->where('name', 'Krylya Sovetov')->first()->id,
                'command_first_goals' => 5,
                'command_second_goals' => 0,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Fakel')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Locomotiv')->first()->id,
                'winner_id' => DB::table('commands')->where('name', 'Locomotiv')->first()->id,
                'command_first_goals' => 0,
                'command_second_goals' => 1,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Khimki')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Torpedo')->first()->id,
                'winner_id' => DB::table('commands')->where('name', 'Khimki')->first()->id,
                'command_first_goals' => 1,
                'command_second_goals' => 0,
                'status' => 'ended',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2022-11-11'),
            ],

            [
                'command_first_id' => DB::table('commands')->where('name', 'Zenit')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Dinamo')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Rostov')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Spartak')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Orenburg')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Ahmat')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'CSKA')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Krasnodar')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Locomotiv')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Ural')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Khimki')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Pari NN')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Fakel')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Sochi')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
            [
                'command_first_id' => DB::table('commands')->where('name', 'Krylya Sovetov')->first()->id,
                'command_second_id' => DB::table('commands')->where('name', 'Torpedo')->first()->id,
                'winner_id' => null,
                'command_first_goals' => null,
                'command_second_goals' => null,
                'status' => 'wait',
                'date_of_match' => Carbon::createFromFormat('Y-m-d', '2023-02-11'),
            ],
        ];

        foreach ($data as $item) {
            FootballMatch::firstOrCreate($item);
        }
    }
}
