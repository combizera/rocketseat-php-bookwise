<?php

function view($view, $data = []): void
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require "views/components/head.php";
}

function dd(...$dump): void
{
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
    die();
}

function abort($code): void
{
    http_response_code($code);
    view($code);
    die();
}
