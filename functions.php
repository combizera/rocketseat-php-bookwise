<?php

function view($view): void
{
    require "views/{$view}.view.php";
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
