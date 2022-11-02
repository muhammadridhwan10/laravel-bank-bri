<?php

namespace Ridhwan\LaravelBankBri\Facades;

use Illuminate\Support\Facades\Facade;

class BriFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BriAPI';
    }
}
