<?php

function view($view, $data = []): void
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require "views/components/head.php";
}

function dump(...$dump): void
{
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
}

function dd(...$dump): void
{
    dump($dump);
    die();
}

function abort($code): void
{
    http_response_code($code);
    view($code);
    die();
}
