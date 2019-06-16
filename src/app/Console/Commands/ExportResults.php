<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mawdoo3\Search\Models\SavedResults;

class ExportResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export-to-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will export database data to csv file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['id', 'title', 'description', 'link', 'comment'];
        $savedResults = SavedResults::all()->toArray();
        array_unshift($savedResults, $headers);

        if(!file_exists('CSVFiles')) {
            mkdir('CSVFiles');
        }

        $timeStamp = time();
        $fileName = "CSVFiles/saved_results" . "$timeStamp" . ".csv";
        $csvFile = fopen($fileName,'w');

        foreach ($savedResults as $savedResult) {
            fputcsv($csvFile, $savedResult);
        }

        fclose($csvFile);

        return true;
    }
}
