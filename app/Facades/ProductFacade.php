<?php
// app/Facades/ProductFacade.php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'product'; // This should match the binding in the service provider
    }
}
