<?php 
namespace Matriphe\Gcm;

use Illuminate\Support\Facades\Facade;

class GcmFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'gcm';
    }

}