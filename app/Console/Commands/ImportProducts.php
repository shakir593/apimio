<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   // app/Console/Commands/ImportProducts.php
// Configure signature, description, etc.
    public function handle()
    {
        $file = storage_path('app/products.csv');
        $csv = array_map('str_getcsv', file($file));

        $header = array_shift($csv);
        $csvData = array_map(function ($row) use ($header) {
            return array_combine($header, $row);
        }, $csv);

        // Import products using batch processing and queue
        $chunks = array_chunk($csvData, 100);

        foreach ($chunks as $chunk) {
            ImportProductsBatch::dispatch($chunk);
        }
    }

}
