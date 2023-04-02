<?php

namespace App\Console\Commands;

use App\Entities\Imports\Clients\ImportDataClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportTestDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test_import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $import = new ImportDataClient();
//        $response = $import->client->request('GET', 'posts');
        $response = HTTP::withHeaders([
            "X-RapidAPI-Host" => "api-football-beta.p.rapidapi.com",
            "X-RapidAPI-Key" => "12456c59f3msh6640d948d32100ep113d7cjsn147bef5ae835"])
        ->get('https://api-football-beta.p.rapidapi.com/leagues', ['id' => '235', 'season' => 2022]);
        dd(json_decode($response->getBody()->getContents()));
    }
}
