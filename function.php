<?php

function dd($vlaue){
    echo "<pre>";
    var_dump($vlaue);
    echo "</pre>";

    die();
}

// dd($_SERVER['REQUEST_URI']);



function error($code = 404, $routers = []){
        http_response_code($code);

        $errorcode = 'controller/{$code}.php';

        die();
}
