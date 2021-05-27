<?php

namespace Core;

class Core
{
    public function run()
    {
        $router = new Router;
        $router->choseRouter('dynamic');
    }
}
