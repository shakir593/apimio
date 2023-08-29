<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportProductsBatch;
class ImportProductController extends Controller
{
    public function product_import()
    {
        dispatch(new ImportProductsBatch());
        return redirect()->back();

    }
}
