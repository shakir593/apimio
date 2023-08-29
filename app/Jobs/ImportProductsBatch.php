<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportProductsBatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
   // app/Jobs/ImportProductsBatch.php
    public function handle(): void
    {
        $path=storage_path('app/products.csv');
        $file = fopen($path,"r");

        while (($productData = fgetcsv($file)) !== FALSE) {
            // Check if a product with the same SKU already exists
            $existingProduct = Product::where('sku', $productData['sku'])->first();

            if ($existingProduct) {
                event(new ProductExistsEvent($existingProduct));
                continue;
            }

            // Create a new product and its variants
            $product = Product::create($productData);

            // Optionally, if you have variant data, you can associate them here
            // Example: $product->variants()->create([...]);
        }
    }

}
