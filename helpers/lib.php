<?php

function view($file, $data = [])
{

    extract($data);

    return require VIEWS."/{$file}.php";
}
?>
