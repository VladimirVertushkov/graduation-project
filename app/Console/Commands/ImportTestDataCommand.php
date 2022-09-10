<?php

namespace App\Console\Commands;

use App\Entities\Imports\Clients\ImportDataClient;
use Illuminate\Console\Command;

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
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        dd(json_decode($response->getBody()->getContents()));
    }
}
