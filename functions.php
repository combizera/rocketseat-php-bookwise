<?php

function dd(...$dump): void
{
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
    die();
}
