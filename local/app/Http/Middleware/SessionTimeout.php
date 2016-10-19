<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;

class SessionTimeout {

    protected $session;
    protected $timeout = 1;

    public function __construct(Store $session){
        $this->session = $session;
    }

}