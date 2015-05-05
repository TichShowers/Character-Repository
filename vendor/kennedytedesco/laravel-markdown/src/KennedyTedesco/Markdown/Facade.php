<?php
namespace KennedyTedesco\Markdown;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade {    
    protected static function getFacadeAccessor() { return 'KennedyTedesco\Markdown\Markdown'; }    
}