<?php

namespace Core;

class Request
{
    public function request($in){
        $result = trim($in);
        $result = stripslashes($result);
        $result = htmlspecialchars($result, ENT_QUOTES);
        return $result;
    }
}
